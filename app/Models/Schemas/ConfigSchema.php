<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\ConfigSchema
 *
 * @property int                             $id
 * @property string                          $name
 * @property \App\Models\array<mixed>|string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class ConfigSchema extends BaseSchema
{
}
