<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\SocialiteClientSchema;

class SocialiteClient extends SocialiteClientSchema
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'icon',
        'client_id',
        'client_secret',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
