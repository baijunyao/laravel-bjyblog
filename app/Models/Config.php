<?php

declare(strict_types=1);

namespace App\Models;

use Str;

/**
 * Class Config
 *
 * @property int                             $id         主键
 * @property string                          $name       配置项键名
 * @property string                          $value      配置项键值 1表示开启 0 关闭
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Config extends Base
{
    /**
     * @param string $value
     *
     * @return array<mixed>|string
     */
    public function getValueAttribute($value)
    {
        if (Str::isJsonArray($value)) {
            return json_decode($value, true);
        }

        return $value;
    }

    /**
     * @param array<mixed>|string $value
     */
    public function setValueAttribute($value): void
    {
        $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
    }
}
