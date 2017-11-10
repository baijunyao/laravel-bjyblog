<?php

namespace App\Models;

class FriendshipLink extends Base
{

    /**
     * 添加数据
     *
     * @param array $data
     * @return bool
     */
    public function storeData($data)
    {
        // 如果排序是空；则设置为null
        $data['sort'] = empty($data['sort']) ? null : $data['sort'];
        return parent::storeData($data);
    }

    /**
     * 修改数据
     *
     * @param array $map
     * @param array $data
     * @return bool
     */
    public function updateData($map, $data)
    {
        // 如果要修改sort；且sort是空；则设置为null
        if (isset($data['sort']) && empty($data['sort'])) {
            $data['sort'] = null;
        }
        return parent::updateData($map, $data);
    }

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
