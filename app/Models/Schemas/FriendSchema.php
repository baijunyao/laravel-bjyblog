<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\FriendSchema
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $url
 * @property int|null                        $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class FriendSchema extends BaseSchema
{
}
