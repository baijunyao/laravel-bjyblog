<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Base implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, Notifiable;
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
    public function updateData($map, $data, $flash = true)
    {
        //如果传password 则加密
        if (!empty($data['password'])) {
            $data['password']=bcrypt($data['password']);
        }
        return parent::updateData($map, $data, $flash);
    }


}
