<?php

namespace App\Models;

/**
 * Class Site
 *
 * @property int    $id                主键
 * @property int    $socialite_user_id 第三方用户id
 * @property string $name              网站名
 * @property string $description       描述
 * @property string $url               网站链接
 * @property int    $audit             审核状态1为通过审核
 * @property int    $sort              排序
 *
 * @author  hanmeimei
 */
class Site extends Base
{
    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class);
    }

    public function setUrlAttribute($value)
    {
        // 如果没有http 则补上http
        if (strpos($value, 'http') === false) {
            $value = 'http://' . $value;
        }

        $this->attributes['url'] = strtolower(rtrim($value, '/'));
    }
}
