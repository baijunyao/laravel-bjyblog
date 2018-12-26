<?php

namespace App\Models;

use Laravel\Scout\Searchable;

class Article extends Base
{
    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('id', 'title', 'keywords', 'description', 'markdown');
    }

    /**
     * 过滤描述中的换行。
     *
     * @param  string  $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return str_replace(["\r", "\n", "\r\n"], '', $value);
    }

    /**
     * 关联文章表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 关联标签表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

    /**
     * 添加文章
     *
     * @param array $data
     * @return bool|mixed
     */
    public function storeData($data, $flash = true)
    {
        // 如果没有描述;则截取文章内容的前200字作为描述
        if (empty($data['description'])) {
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['markdown']);
            $data['description'] = re_substr($description, 0, 200, true);
        }

        // 给文章的插图添加水印;并取第一张图片
        $firstImage = $this->getCover($data['markdown']);

        // 如果没有上传封面图；则取第一张图片作为封面图
        if (empty($data['cover'])) {
            $data['cover'] = $firstImage;
        }

        // 把markdown转html
        $data['html'] = markdown_to_html($data['markdown']);
        $tag_ids = $data['tag_ids'];
        unset($data['tag_ids']);
        //添加数据
        $result = parent::storeData($data, $flash);
        if ($result) {
            // 给文章添加标签
            $articleTag = new ArticleTag();
            $articleTag->addTagIds($result, $tag_ids);
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 给文章的插图添加水印;并取第一张图片作为封面图
     *
     * @param $content        markdown格式的文章内容
     * @param array $except   忽略加水印的图片
     * @return string
     */
    public function getCover($content, $except = [])
    {
        // 获取文章中的全部图片
        preg_match_all('/!\[.*?\]\((\S*(?<=png|gif|jpg|jpeg)).*?\)/i', $content, $images);
        if (empty($images[1])) {
            $cover = 'uploads/article/default.jpg';
        } else {
            // 循环给图片添加水印
            foreach ($images[1] as $k => $v) {
                $image = explode(' ', $v);
                $file = public_path().$image[0];
                if (file_exists($file) && !in_array($v, $except)) {
                    add_text_water($file, config('bjyblog.water.text'));
                }

                // 取第一张图片作为封面图
                if ($k == 0) {
                    $cover = $image[0];
                }
            }
        }
        return $cover;
    }

    /**
     * 搜索文章获取文章id
     *
     * @param $wd
     *
     * @return \Illuminate\Support\Collection
     */
    public function searchArticleGetId($wd)
    {
        // 如果 SCOUT_DRIVER 为 null 则使用 sql 搜索
        if (is_null(env('SCOUT_DRIVER'))) {
            $id = Article::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
            return $id;
        }

        // 如果全文搜索出错则降级使用 sql like
        try{
            $id = Article::search($wd)->keys();
        } catch (\Exception $e) {
            $id = Article::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }
        return $id;
    }

}
