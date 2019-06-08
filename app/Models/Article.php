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
     * @param string $value
     *
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
     * 给文章的插图添加水印;并取第一张图片作为封面图
     *
     * @param $content        markdown格式的文章内容
     * @param array $except 忽略加水印的图片
     *
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
                $file  = public_path() . $image[0];
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
        if (env('SCOUT_DRIVER') === null) {
            return self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }

        // 如果全文搜索出错则降级使用 sql like
        try {
            $id = self::search($wd)->keys();
        } catch (\Exception $e) {
            $id = self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }

        return $id;
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (config('bjyblog.seo.use_slug') === 'true') {
            $parameters[] = $this->slug;
        }

        return url('article', $parameters);
    }
}
