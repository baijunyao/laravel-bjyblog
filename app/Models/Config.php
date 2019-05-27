<?php

namespace App\Models;

class Config extends Base
{
    /**
     * 如果 value 是 json 则转成数组
     *
     * @param $value
     *
     * @return mixed
     */
    public function getValueAttribute($value)
    {
        if (is_json($value) && mb_substr($value, 0, 1) === '[') {
            return json_decode($value, true);
        } else {
            return $value;
        }
    }

    /**
     * 如果 value 是数组 则转成 json
     *
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
    }
}
