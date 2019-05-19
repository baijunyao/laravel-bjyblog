<?php

namespace App\Models;

class Category extends Base
{
    /**
     * 一对多关联文章
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (config('bjyblog.seo.use_slug') === 'true') {
            $parameters[] = $this->slug;
        }

        return url('category', $parameters);
    }
}
