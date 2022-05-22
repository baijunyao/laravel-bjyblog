<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\OpenSourceSchema;

class OpenSource extends OpenSourceSchema
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
