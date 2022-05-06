<?php

namespace App\Models\Observers;

use App\Models\Article;
use App\Models\ArticleHistory;
use App\Models\ArticleTag;
use Artisan;
use Markdown;
use Str;

class ArticleObserver extends BaseObserver
{
    public function created(Article $article): void
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function creating(Article $article): void
    {
        if ($article->description === '') {
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
    }

    public function saving(Article $article): void
    {
        if (empty($article->is_top)) {
            $article->is_top = 0;
        }

        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }

        $article->html = Markdown::convert($article->markdown)->getContent();
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

    public function updated(Article $article): void
    {
        // restore() triggering both restored() and updated()
        if(! $article->isDirty('deleted_at') && $article->isDirty('markdown')){
            ArticleHistory::create([
                'article_id' => $article->id,
                'markdown'   => $article->markdown
            ]);
        }
    }

    public function deleted(Article $article): void
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
        } else {
            Artisan::queue('bjyblog:generate-sitemap');
            ArticleTag::where('article_id', $article->id)->delete();
        }
    }

    public function restored(Article $article): void
    {
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
    }
}
