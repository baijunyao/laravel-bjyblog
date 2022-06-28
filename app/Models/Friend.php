<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\FriendSchema;

class Friend extends FriendSchema
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

    /**
     * @param int $value
     */
    public function setSortAttribute($value): void
    {
        $this->attributes['sort'] = empty($value) ? null : $value;
    }

    public function setUrlAttribute(string $value): void
    {
        $this->attributes['url'] = format_url($value);
    }
}
