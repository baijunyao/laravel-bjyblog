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
}
