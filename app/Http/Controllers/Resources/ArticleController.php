<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\Article\Store;
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

    public function store(Store $request, ArticleTag $articleTag)
    {
        $article = Article::create(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown')
        );

        if ($article) {
            $articleTag->addTagIds($article->id, $request->input('tag_ids'));
        }

        return response($article);
    }

    public function update(Store $request, ArticleTag $articleTag)
    {
        $article = Article::find($request->route('article'));

        $result = $article->update(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown')
        );

        if ($result) {
            ArticleTag::where('article_id', $request->route('article'))->forceDelete();
            $articleTag->addTagIds($request->route('article'), $request->input('tag_ids'));
        }

        return response($article);
    }
}
