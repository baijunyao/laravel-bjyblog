<?php

namespace App\Models\Observers;

use App\Models\Article;
use Artisan;

class CategoryObserver extends BaseObserver
{
    /**
     * @param \App\Models\Category $model
     *
     * @return void
     */
    public function created($model)
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return void
     */
    public function saving($category)
    {
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return void|false
     */
    public function deleting($category)
    {
        if (Article::where('category_id', $category->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this category first'));
        }
    }

    /**
     * @param \App\Models\Category $model
     *
     * @return void
     */
    public function deleted($model)
    {
        if (! $model->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
