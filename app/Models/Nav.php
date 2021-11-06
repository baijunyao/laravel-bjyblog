<?php

declare(strict_types=1);

namespace App\Models;

class Nav extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'url',
        'sort',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
