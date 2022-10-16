<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\SocialiteClientSchema
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $icon
 * @property string                          $client_id
 * @property string                          $client_secret
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class SocialiteClientSchema extends BaseSchema
{
}
