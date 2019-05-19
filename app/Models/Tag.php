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

    public function getSlugAttribute(): string
    {
        return str_slug($this->name, '-');
    }

    public function getUrlAttribute(): string
    {
        return action('IndexController@tag', [$this->id, $this->slug]);
    }
}
