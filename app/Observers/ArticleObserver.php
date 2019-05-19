<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Cache;

class ArticleObserver extends BaseObserver
{
    public function saving($article)
    {
        if (empty($article->description)) {
            $article->description = preg_replace(
                ['/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'],
                '',
                $article->markdown
            );
        }

        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }
    }

    public function deleted($article)
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
            flash_success('彻底删除成功');
        } else {
            ArticleTag::where('article_id', $article->id)->delete();
            flash_success('删除成功');
        }

        $this->clearCache();
    }

    public function restored($article)
    {
        // 恢复删除的文章后同步恢复关联表 article_tags 中的数据
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
        flash_success('恢复成功');

        $this->clearCache();
    }

    protected function clearCache()
    {
        // 更新热门推荐文章缓存
        Cache::forget('common:topArticle');
        // 更新标签统计缓存
        Cache::forget('common:tag');
        // 更新feed缓存
        Cache::forget('feed:article');
    }
}
