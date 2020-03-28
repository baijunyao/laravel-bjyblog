<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class SocialiteClient
 *
 * @property int                             $id            主键
 * @property string                          $name          名称
 * @property string                          $icon          icon
 * @property string                          $client_id     客户端ID
 * @property string                          $client_secret 客户端密钥
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class SocialiteClient extends Base
{
}
