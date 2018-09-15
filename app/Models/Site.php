<?php

namespace App\Models;

class Site extends Base
{
    public function oauthUser()
    {
        return $this->belongsTo(OauthUser::class);
    }
}
