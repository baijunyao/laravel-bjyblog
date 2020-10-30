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

    public function store(Store $request, ArticleTag $articleTag)
    {
        $article = Article::create(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown', 'is_top')
        );

        $articleTag->addTagIds($article->id, $request->input('tag_ids'));

        return new ArticleResource($article);
    }

    public function update(Store $request, ArticleTag $articleTag)
    {
        $article = Article::find($request->route('article'));

        $result = $article->update(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown', 'is_top')
        );

        if ($result) {
            ArticleTag::where('article_id', $request->route('article'))->forceDelete();
            $articleTag->addTagIds((int) $request->route('article'), $request->input('tag_ids'));
        }

        return new ArticleResource($article);
    }
}
