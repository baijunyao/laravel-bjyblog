<?php

namespace App\Models;

/**
 * Class Config
 *
 * @property int    $id    主键
 * @property string $name  配置项键名
 * @property string $value 配置项键值 1表示开启 0 关闭
 *
 * @author  hanmeimei
 */
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
        }

        return $value;
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
