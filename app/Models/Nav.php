<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\NavSchema;

class Nav extends NavSchema
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
