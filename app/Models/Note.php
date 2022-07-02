<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\NoteSchema;

class Note extends NoteSchema
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
