<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class OpenSource
 *
 * @property int                             $id         项目主键
 * @property int                             $sort       排序
 * @property int                             $type       1:github 2:gitee
 * @property string                          $name       项目名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class OpenSource extends Base
{
}
