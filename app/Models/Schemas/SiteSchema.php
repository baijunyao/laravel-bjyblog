<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\SiteSchema
 *
 * @property int                             $id
 * @property int                             $socialite_user_id
 * @property string                          $name
 * @property string                          $description
 * @property string                          $url
 * @property int                             $audit
 * @property int                             $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\SocialiteUser|null $socialiteUser
 *
 * @mixin \Eloquent
 */
abstract class SiteSchema extends BaseSchema
{
}
