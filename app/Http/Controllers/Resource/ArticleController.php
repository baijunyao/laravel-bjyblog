<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Destroy;
use App\Http\Controllers\Resource\Rest\ForceDelete;
use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Restore;
use App\Http\Controllers\Resource\Rest\Show;
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

    // public function store(Store $request, Article $articleModel, ArticleTag $articleTag)
    // {
    //     $newArticle = $request->only('category_id', 'title', 'author', 'keywords', 'description', 'markdown');
    //
    //     if (empty($newArticle['cover'])) {
    //         $firstImage    = $articleModel->getCover($newArticle['markdown']);
    //         $newArticle['cover'] = $firstImage;
    //     }
    //
    //     $newArticle['html'] = markdown_to_html($newArticle['markdown']);
    //     $article             = Article::create($newArticle);
    //
    //     if ($article) {
    //         $articleTag->addTagIds($article->id, $request->input('tag_ids'));
    //     }
    //
    //     return response($article);
    // }

}
