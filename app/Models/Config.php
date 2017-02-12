<?php

namespace App\Models;

class Config extends Base
{
    protected $guarded = [];

    /**
     * 获取配置项的键值对
     *
     * @return array
     */
    public function getKeyValueArray()
    {
        $config = $this->all();
        $data = [];
        foreach ($config as $k => $v) {
            $data[$v->name] = $v->value;
        }
        return $data;
    }
}
