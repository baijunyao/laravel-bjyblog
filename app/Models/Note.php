<?php

declare(strict_types=1);

namespace App\Models;

class Note extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
