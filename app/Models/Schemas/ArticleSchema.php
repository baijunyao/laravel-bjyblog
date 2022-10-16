<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\ArticleSchema
 *
 * @property int                             $id
 * @property int                             $category_id
 * @property string                          $title
 * @property string                          $slug
 * @property string                          $author
 * @property string                          $markdown
 * @property string                          $html
 * @property string                          $description
 * @property string                          $keywords
 * @property string                          $cover
 * @property int                             $is_top
 * @property int                             $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleHistory[] $articleHistories
 * @property-read \App\Models\Category|null $category
 * @property-read string $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SocialiteUser[] $likers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 *
 * @mixin \Eloquent
 */
abstract class ArticleSchema extends BaseSchema
{
}
