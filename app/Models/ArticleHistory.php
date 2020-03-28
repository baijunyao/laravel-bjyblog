<?php

declare(strict_types=1);

namespace App\Models;

/**
 * App\Models\ArticleHistory
 *
 * @property int                             $id
 * @property int                             $article_id
 * @property string                          $markdown
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article $article
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereMarkdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class ArticleHistory extends Base
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
