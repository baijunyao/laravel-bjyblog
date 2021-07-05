<?php

declare(strict_types=1);

namespace App\Models;

class Site extends Base
{
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
