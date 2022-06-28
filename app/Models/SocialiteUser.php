<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\SocialiteUserSchema;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Overtrue\LaravelFollow\Traits\CanLike;

class SocialiteUser extends SocialiteUserSchema
{
    use CanLike;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'socialite_client_id',
        'name',
        'avatar',
        'openid',
        'access_token',
        'last_login_ip',
        'login_times',
        'email',
        'is_admin',
        'is_blocked',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function socialiteClient(): BelongsTo
    {
        return $this->belongsTo(SocialiteClient::class);
    }
}
