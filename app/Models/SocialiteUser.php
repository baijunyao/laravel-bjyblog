<?php

namespace App\Models;

class SocialiteUser extends UserBase
{
    public function socialiteClient()
    {
        return $this->belongsTo(SocialiteClient::class);
    }
}
