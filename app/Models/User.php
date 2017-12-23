<?php

namespace App\Models;

class User extends Base
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 修改数据
     *
     * @param $map  where条件
     * @param $data 需要修改的数据
     * @return bool 是否成功
     */
    public function updateData($map, $data)
    {
        //如果传password 则加密
        if (!empty($data['password'])) {
            $data['password']=bcrypt($data['password']);
        }
        return parent::updateData($map, $data);
    }


}
