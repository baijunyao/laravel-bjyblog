<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Overtrue\LaravelFollow\Traits\CanLike;

/**
 * Class SocialiteUser
 *
 * @property int                             $id                  主键id
 * @property int                             $socialite_client_id 类型 1：QQ  2：新浪微博 3：github
 * @property string                          $name                第三方昵称
 * @property string                          $avatar              头像
 * @property string                          $openid              第三方用户id
 * @property string                          $access_token        access_token token
 * @property string                          $last_login_ip       最后登录ip
 * @property int                             $login_times         登录次数
 * @property string                          $email               邮箱
 * @property int                             $is_admin            是否是admin
 * @property int                             $is_blocked
 * @property string                          $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\SocialiteClient $socialiteClient
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereLoginTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereSocialiteClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialiteUser extends UserBase
{
    use CanLike;

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
