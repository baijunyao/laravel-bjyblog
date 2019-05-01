<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Show;
use App\Http\Controllers\Resource\Rest\Store;
use App\Http\Controllers\Resource\Rest\Update;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use Index, Store, Show, Update;

    private const MODEL = Article::class;

    private const COLUMN = [
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
