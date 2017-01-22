<?php

namespace App\Models;

class Article extends Base
{

    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'content',
        'keywords',
        'description',
        'is_top',
        'click'
    ];

    

}
