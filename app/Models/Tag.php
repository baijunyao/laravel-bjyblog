<?php

namespace App\Models;

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

    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (config('bjyblog.seo.use_slug') === 'true') {
            $parameters[] = $this->slug;
        }

        return url('tag', $parameters);
    }
}
