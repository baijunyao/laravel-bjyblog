<?php

declare(strict_types=1);

namespace App\Models;

class OpenSource extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'sort',
        'type',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
