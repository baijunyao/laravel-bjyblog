<?php

namespace App\Models;

/**
 * Class User
 *
 * @property int    $id                主键ID
 * @property string $name              昵称
 * @property string $email             邮箱
 * @property int    $email_verified_at 邮箱验证时间
 * @property string $password          密码
 * @property string $remember_token
 *
 * @author  hanmeimei
 */
class User extends UserBase
{
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
