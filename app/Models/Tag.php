<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

/**
 * Class Tag
 *
 * @property int                             $id          标签主键
 * @property string                          $name        标签名
 * @property string                          $slug        slug
 * @property string                          $keywords    标签关键词
 * @property string                          $description 标签描述主要是 SEO
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \UrlGenerator|string $url
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Tag extends Base
{
    /**
     * 关联文章表
     *
     * @return BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }

    /**
     * @return UrlGenerator|string
     *
     * @author hanmeimei
     */
    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('tag', $parameters);
    }
}
