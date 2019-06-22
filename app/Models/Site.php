<?php

namespace App\Models;

class Site extends Base
{
    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class);
    }

    public function setUrlAttribute($value)
    {
        // 如果没有http 则补上http
        if (strpos($value, 'http') === false) {
            $value = 'http://' . $value;
        }

        $this->attributes['url'] = strtolower(rtrim($value, '/'));
    }
}
