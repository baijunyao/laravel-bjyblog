<?php

namespace App\Models;

class Article extends Base
{
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
    public function storeData($data)
    {
        // 如果没有描述;则截取文章内容的前200字作为描述
        if (empty($data['description'])) {
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['markdown']);
            $data['description'] = re_substr($description, 0, 200, true);
        }

        // 给文章的插图添加水印;并取第一张图片作为封面图
        $data['cover'] = $this->getCover($data['markdown']);
        // 把markdown转html
        $data['html'] = markdown_to_html($data['markdown']);
        $tag_ids = $data['tag_ids'];
        unset($data['tag_ids']);
        //添加数据
        $result = parent::storeData($data);
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
        preg_match_all('/!\[.*?\]\((\S*).*\)/i', $content, $images);
        if (empty($images[1])) {
            $cover = 'uploads/article/default.jpg';
        } else {
            // 循环给图片添加水印
            foreach ($images[1] as $k => $v) {
                $image = explode(' ', $v);
                $file = public_path().$image[0];
                if (file_exists($file) && !in_array($v, $except)) {
                    Add_text_water($file, cache('config')->get('TEXT_WATER_WORD'));
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
     * 获取前台文章列表
     *
     * @return mixed
     */
    public function getHomeList($map = [])
    {
        // 获取文章分页
        $data = $this
            ->whereMap($map)
            ->select('articles.id', 'articles.title', 'articles.cover', 'articles.author', 'articles.description', 'articles.category_id', 'articles.created_at', 'c.name as category_name')
            ->join('categories as c', 'articles.category_id', 'c.id')
            ->orderBy('articles.created_at', 'desc')
            ->paginate(10);
        // 提取文章id组成一个数组
        $dataArray = $data->toArray();
        $article_id = array_column($dataArray['data'], 'id');
        // 传递文章id数组获取标签数据
        $articleTagModel = new ArticleTag();
        $tag = $articleTagModel->getTagNameByArticleIds($article_id);
        foreach ($data as $k => $v) {
            $data[$k]->tag = isset($tag[$v->id]) ? $tag[$v->id] : [];
        }
        return $data;
    }

}
