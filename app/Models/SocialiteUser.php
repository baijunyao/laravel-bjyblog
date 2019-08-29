<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SocialiteUser
 *
 * @property int    $id                  主键id
 * @property bool   $socialite_client_id 类型 1：QQ  2：新浪微博 3：github
 * @property string $name                第三方昵称
 * @property string $avatar              头像
 * @property string $openid              第三方用户id
 * @property string $access_token        access_token token
 * @property string $last_login_ip       最后登录ip
 * @property string $login_times         登录次数
 * @property string $email               邮箱
 * @property string $is_admin            是否是admin
 * @property string $remember_token
 *
 * @author  hanmeimei
 */
class SocialiteUser extends UserBase
{
    /**
     * @return BelongsTo
     *
     * @author hanmeimei
     */
    public function socialiteClient()
    {
        return $this->belongsTo(SocialiteClient::class);
    }
}
