<?php

declare(strict_types=1);

namespace App\Models;

class Console extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
