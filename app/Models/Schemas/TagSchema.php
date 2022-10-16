<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\TagSchema
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $slug
 * @property string                          $keywords
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read string $url
 *
 * @mixin \Eloquent
 */
abstract class TagSchema extends BaseSchema
{
}
