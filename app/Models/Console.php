<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\ConsoleSchema;

class Console extends ConsoleSchema
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
