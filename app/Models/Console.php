<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Console
 *
 * @property int                             $id         主键
 * @property string                          $name       名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Console extends Base
{
}
