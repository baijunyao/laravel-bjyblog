<?php

namespace App\Models;

class FriendshipLink extends Base
{
    public function setSortAttribute($value)
    {
        $this->attributes['sort'] =  empty($value) ? null : $value;
    }

    /**
     * 给url添加http 或者删除/
     *
     * @param string $value
     *
     * @return string
     */
    public function setUrlAttribute($value)
    {
        // 如果没有http 则补上http
        if (strpos($value, 'http') === false) {
            $value = 'http://' . $value;
        }

        $this->attributes['url'] = strtolower(rtrim($value, '/'));
    }
}
