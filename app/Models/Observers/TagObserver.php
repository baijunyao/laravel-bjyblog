<?php

namespace App\Models\Observers;

use App\Models\ArticleTag;
use Artisan;

class TagObserver extends BaseObserver
{
    /**
     * @param \App\Models\Tag $tag
     *
     * @return void
     */
    public function created($tag)
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Tag $tag
     *
     * @return void
     */
    public function saving($tag)
    {
        if ($tag->isDirty('name') && empty($tag->slug)) {
            $tag->slug = generate_english_slug($tag->name);
        }
    }

    /**
     * @param \App\Models\Tag $tag
     *
     * @return void
     */
    public function deleting($tag)
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this tag first'));
        }
    }

    /**
     * @param \App\Models\Tag $tag
     *
     * @return void
     */
    public function deleted($tag)
    {
        if (! $tag->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
