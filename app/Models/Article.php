<?php

declare(strict_types=1);

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Str;

class Article extends Base
{
    use Searchable, CanBeLiked;

    /**
     * @return array<string,mixed>
     */
    public function toSearchableArray(): array
    {
        return $this->only('id', 'title', 'keywords', 'description', 'markdown');
    }

    public function getDescriptionAttribute(string $value): string
    {
        return str_replace(["\r", "\n", "\r\n"], '', $value);
    }

    public function getHtmlAttribute(string $value): string
    {
        return str_replace('<img src="/uploads/article', '<img src="' . cdn_url('uploads/article'), $value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

    public function articleHistories(): HasMany
    {
        return $this->hasMany(ArticleHistory::class);
    }

    /**
     * @return array<int,int>
     */
    public static function getIdsGivenSearchWord(string $wd): array
    {
        if (trim($wd) === '') {
            return [];
        }

        // 如果 SCOUT_DRIVER 为 null 则使用 sql 搜索
        if (Str::isNull(config('scout.driver'))) {
            return self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id')
                ->toArray();
        }

        // 如果全文搜索出错则降级使用 sql like
        try {
            $ids = self::search($wd)->keys()->toArray();
        } catch (Exception $e) {
            $ids = self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id')
                ->toArray();
        }

        return $ids;
    }

    public function getUrlAttribute(): string
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('article', $parameters);
    }
}
