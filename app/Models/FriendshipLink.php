<?php

namespace App\Models;

class FriendshipLink extends Base
{
    /**
     * 给url添加http 或者删除/
     *
     * @param  string  $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        // 如果没有http 则补上http
        if (strpos($value, 'http') === false) {
            $value = 'http://'.$value;
        }
        // 删除右侧的/
        $value = rtrim($value, '/');
        $this->attributes['first_name'] = strtolower($value);
    }
}
