<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\Article\Store;
use App\Http\Resources\Article as ArticleResource;
use App\Models\Article;
use App\Models\ArticleTag;
use Baijunyao\LaravelRestful\Traits\Destroy;
use Baijunyao\LaravelRestful\Traits\ForceDelete;
use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Restore;
use Baijunyao\LaravelRestful\Traits\Show;

class ArticleController extends Controller
{
    use Index, Show, Destroy, Restore, ForceDelete;

    protected const FILTERS = [
        'title', 'keywords', 'markdown',
    ];

    protected const SORTS = [
        'created_at',
    ];

    public function store(Store $request, ArticleTag $article_tag): ArticleResource
    {
        $article = Article::create(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown', 'is_top', 'cover')
        );

        $article_tag->addTagIds($article->id, $request->input('tag_ids'));

        return new ArticleResource($article);
    }

    public function update(Store $request, ArticleTag $article_tag): ArticleResource
    {
        $article = Article::findOrFail($request->route('article'));

        $result = $article->update(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown', 'is_top', 'cover')
        );

        if ($result) {
            ArticleTag::where('article_id', $request->route('article'))->forceDelete();
            $article_tag->addTagIds((int) $request->route('article'), $request->input('tag_ids'));
        }

        return new ArticleResource($article);
    }
}
