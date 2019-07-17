<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Resources\Rest\Destroy;
use App\Http\Controllers\Resources\Rest\ForceDelete;
use App\Http\Controllers\Resources\Rest\Index;
use App\Http\Controllers\Resources\Rest\Restore;
use App\Http\Controllers\Resources\Rest\Show;
use App\Models\Article;
use App\Models\ArticleTag;
use Baijunyao\LaravelUpload\Upload;
use App\Http\Requests\Article\Store;

class ArticleController extends Controller
{
    use Index, Show, Destroy, Restore, ForceDelete;

    protected const MODEL = Article::class;

    protected const COLUMN = [
        'id',
        'category_id',
        'title',
        'click',
        'created_at',
        'updated_at'
    ];

    protected const RELATIONS = [
        'category' => [
            'id',
            'name'
        ],
        'tags' => [
            'id',
            'name'
        ]
    ];

    public function store(Store $request, Article $articleModel, ArticleTag $articleTag)
    {
        $article = Article::create(
            $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown')
        );

        if ($article) {
            $articleTag->addTagIds($article->id, $request->input('tag_ids'));
        }

        return response($article);
    }

    public function update(Store $request, Article $articleModel, ArticleTag $articleTag)
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
