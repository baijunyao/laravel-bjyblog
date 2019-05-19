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

 	public function getSlugAttribute(): string
    {
        return str_slug($this->name, '-');
    }

    public function getUrlAttribute(): string
    {
        return action('IndexController@category', [$this->id, $this->slug]);
    }
}
