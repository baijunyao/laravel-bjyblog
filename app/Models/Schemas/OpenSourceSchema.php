<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\OpenSourceSchema
 *
 * @property int                             $id
 * @property int                             $sort
 * @property int                             $type       1:github 2:gitee
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class OpenSourceSchema extends BaseSchema
{
}
