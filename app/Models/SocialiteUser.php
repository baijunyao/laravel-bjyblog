<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Overtrue\LaravelFollow\Traits\CanLike;

class SocialiteUser extends UserBase
{
    use CanLike;

    public function socialiteClient(): BelongsTo
    {
        return $this->belongsTo(SocialiteClient::class);
    }
}
