<?php

namespace App\Models\Observers;

use App\Models\ArticleTag;
use App\Models\Tag;
use Artisan;

class TagObserver extends BaseObserver
{
    public function created(Tag $tag): void
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function saving(Tag $tag): void
    {
        if (($tag->slug === null || $tag->slug === '') && $tag->isDirty('name')) {
            $tag->slug = generate_english_slug($tag->name);
        }
    }

    public function deleting(Tag $tag): void
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this tag first'));
        }
    }

    public function deleted(Tag $tag): void
    {
        if (! $tag->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
