<?php

declare(strict_types=1);

namespace App\Models;

class SocialiteClient extends Base
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
