<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\SiteSchema;

class Site extends SiteSchema
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'socialite_user_id',
        'name',
        'description',
        'url',
        'audit',
        'sort',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class);
    }

    public function setUrlAttribute(string $value): void
    {
        $this->attributes['url'] = format_url($value);
    }
}
