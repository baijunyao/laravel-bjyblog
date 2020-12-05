<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Site
 *
 * @property int                             $id                主键
 * @property int                             $socialite_user_id 第三方用户id
 * @property string                          $name              网站名
 * @property string                          $description       描述
 * @property string                          $url               网站链接
 * @property int                             $audit             审核状态1为通过审核
 * @property int                             $sort              排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\SocialiteUser $socialiteUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereAudit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereSocialiteUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Site extends Base
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class);
    }

    public function setUrlAttribute(string $value): void
    {
        $this->attributes['url'] = format_url($value);
    }
}
