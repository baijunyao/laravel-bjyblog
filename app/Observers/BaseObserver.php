<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Category;
use Cache;

class BaseObserver
{
    public function created()
    {
        flash_success('添加成功');
        $this->clearCache();
    }

    public function updated(Category $category)
    {
        // restore() triggering both restored() and updated()
        if($category->getOriginal('deleted_at') === $category->deleted_at){
            flash_success('修改成功');
        }
        $this->clearCache();
    }

    public function deleting(Category $category)
    {
        if (Article::where('category_id', $category->id)->count() !== 0) {
            flash_error('请先删除此分类下的文章');
            return false;
        }
    }

    public function deleted(Category $category)
    {
        // delete() and forceDelete() will triggering deleted()
        if ($category->isForceDeleting()) {
            flash_success('彻底删除成功');
        } else {
            flash_success('删除成功');
        }

        $this->clearCache();
    }

    public function restored()
    {
        flash_success('恢复成功');
        $this->clearCache();
    }

    protected function clearCache()
    {
    }
}
