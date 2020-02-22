<?php

declare(strict_types=1);

namespace App\Models;

use Str;

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
    public function getValueAttribute($value)
    {
        if (Str::isJsonArray($value)) {
            return json_decode($value, true);
        }

        return $value;
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
    }
}
