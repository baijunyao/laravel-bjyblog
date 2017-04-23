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
    public function editData($map, $data)
    {
        //如果存在_token字段；则删除
        if (isset($data['_token'])) {
            unset($data['_token']);
        }

        //如果传password 则加密
        if (!empty($data['password'])) {
            $data['password']=bcrypt($data['password']);
        }

        //修改数据
        $result=$this
            ->where($map)
            ->update($data);
        if ($result) {
            session()->flash('alert-message','修改成功');
            session()->flash('alert-class','alert-success');
            return $result;
        }else{
            return false;
        }
    }
}
