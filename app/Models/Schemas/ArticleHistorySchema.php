<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\ArticleHistorySchema
 *
 * @property int                             $id
 * @property int                             $article_id
 * @property string                          $markdown
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article|null $article
 *
 * @mixin \Eloquent
 */
abstract class ArticleHistorySchema extends BaseSchema
{
}
