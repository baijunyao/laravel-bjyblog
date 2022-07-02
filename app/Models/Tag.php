<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\TagSchema;
use Str;

class Tag extends TagSchema
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'slug',
        'keywords',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * 关联文章表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }

    public function getUrlAttribute(): string
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('tags', $parameters);
    }
}
