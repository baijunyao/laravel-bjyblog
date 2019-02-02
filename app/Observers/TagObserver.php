<?php

namespace App\Observers;

use App\Models\ArticleTag;
use App\Models\Tag;
use Cache;

class TagObserver extends BaseObserver
{
    public function deleting(Tag $tag)
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            flash_error('此标签下有文章，不可以删除。');
            return false;
        }
    }

    protected function clearCache()
    {
        Cache::forget('common:tag');
    }
}
