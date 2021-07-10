<?php

declare(strict_types=1);

namespace App\Models;

use Str;

class Tag extends Base
{
    /**
     * 关联文章表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     *
     * @author hanmeimei
     */
    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('tag', $parameters);
    }
}
