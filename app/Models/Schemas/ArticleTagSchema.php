<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\ArticleTagSchema
 *
 * @property int                             $article_id
 * @property int                             $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
abstract class ArticleTagSchema extends BaseSchema
{
}
