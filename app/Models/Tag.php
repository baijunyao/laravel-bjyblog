<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 *
 * @property int    $id          标签主键
 * @property string $name        标签名
 * @property string $slug        slug
 * @property string $keywords    标签关键词
 * @property string $description 标签描述主要是 SEO
 *
 * @author  hanmeimei
 */
class Tag extends Base
{
    /**
     * 关联文章表
     *
     * @return BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }

    /**
     * @return UrlGenerator|string
     *
     * @author hanmeimei
     */
    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (is_true(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('tag', $parameters);
    }
}
