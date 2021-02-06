<?php

namespace App\Observers;

use App\Models\ArticleHistory;
use App\Models\ArticleTag;
use Artisan;
use Markdown;
use Str;

class ArticleObserver extends BaseObserver
{
    /**
     * @param \App\Models\Article $article
     */
    public function created($article)
    {
        parent::created($article);

        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Article $article
     */
    public function saving($article)
    {
        if (empty($article->description)) {
            $content = preg_replace(
                ['/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'],
                '',
                $article->markdown
            );

            assert(is_string($content));

            if (config('app.locale') === 'zh-CN') {
                $article->description = Str::substr($content, 0, 200);
            } else {
                $article->description = Str::words($content, 30, '');
            }
        }

        if (empty($article->is_top)) {
            $article->is_top = 0;
        }

        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }

        $article->html = Markdown::convertToHtml($article->markdown);
        $image_paths = get_image_paths_from_html($article->html);

        foreach ($image_paths as $image_path) {
            if (function_exists('imagettfbbox') && file_exists(public_path($image_path))) {
                watermark($image_path, config('bjyblog.water.text'));
            }
        }

        if (empty($article->cover)) {
            $article->cover = $image_paths[0] ?? '/uploads/article/default.jpg';
        }

    }

    /**
     * @param \App\Models\Article $article
     */
    public function updated($article)
    {
        parent::updated($article);

        // restore() triggering both restored() and updated()
        if(! $article->isDirty('deleted_at') && $article->isDirty('markdown')){
            ArticleHistory::create([
                'article_id' => $article->id,
                'markdown'   => $article->markdown
            ]);
        }
    }

    /**
     * @param \App\Models\Article $article
     */
    public function deleted($article)
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
            flash_success('彻底删除成功');
        } else {
            Artisan::queue('bjyblog:generate-sitemap');
            ArticleTag::where('article_id', $article->id)->delete();
            flash_success('删除成功');
        }
    }

    /**
     * @param \App\Models\Article $article
     */
    public function restored($article)
    {
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
        flash_success('恢复成功');
    }
}
