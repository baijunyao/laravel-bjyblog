<?php

namespace App\Models\Observers;

use App\Models\Article;
use App\Models\Category;
use Artisan;

class CategoryObserver extends BaseObserver
{
    public function created(Category $category): void
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function saving(Category $category): void
    {
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

    public function deleting(Category $category): void
    {
        if (Article::where('category_id', $category->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this category first'));
        }
    }

    public function deleted(Category $category): void
    {
        if (! $category->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
