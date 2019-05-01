<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Destroy;
use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Show;
use App\Http\Controllers\Resource\Rest\Store;
use App\Http\Controllers\Resource\Rest\Update;
use App\Models\Article;

class ArticleController extends Controller
{
    use Index, Store, Show, Update, Destroy;

    public const MODEL = Article::class;

    public const COLUMN = [
        'id',
        'category_id',
        'title',
        'click',
    ];

    private const RELATIONS = [
        'category' => [
            'id',
            'name'
        ],
    ];
}
