<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\NavSchema
 *
 * @property int                             $id
 * @property int                             $sort
 * @property string                          $name
 * @property string                          $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class NavSchema extends BaseSchema
{
}
