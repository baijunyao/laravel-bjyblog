<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Artisan;

class TagObserver extends BaseObserver
{
    /**
     * @param \App\Models\Tag $tag
     */
    public function created($tag)
    {
        parent::created($tag);

        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Tag $tag
     */
    public function saving($tag)
    {
        if ($tag->isDirty('name') && empty($tag->slug)) {
            $tag->slug = generate_english_slug($tag->name);
        }
    }

    /**
     * @param \App\Models\Tag $tag
     */
    public function deleting($tag)
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            flash_error('此标签下有文章，不可以删除。');
            return false;
        }
    }

    /**
     * @param \App\Models\Tag $tag
     */
    public function deleted($tag)
    {
        parent::deleted($tag);

        if (! $tag->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
