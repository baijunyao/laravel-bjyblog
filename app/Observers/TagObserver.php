<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Artisan;

class TagObserver extends BaseObserver
{
    public function created($model)
    {
        parent::created($model);

        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function saving($category)
    {
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

    public function deleting($tag)
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            flash_error('此标签下有文章，不可以删除。');
            return false;
        }
    }

    public function deleted($model)
    {
        parent::deleted($model);

        if (! $model->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
