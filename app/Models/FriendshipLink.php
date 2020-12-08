<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class FriendshipLink
 *
 * @property int                             $id         主键ID
 * @property string                          $name       链接名
 * @property string                          $url        链接地址
 * @property int                             $sort       排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\FriendshipLink newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\FriendshipLink newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\FriendshipLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class FriendshipLink extends Base
{
    /**
     * @param int $value
     */
    public function setSortAttribute($value): void
    {
        $this->attributes['sort'] = empty($value) ? null : $value;
    }

    public function setUrlAttribute(string $value): void
    {
        $this->attributes['url'] = format_url($value);
    }
}
