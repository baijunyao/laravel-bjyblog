<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Show;
use App\Http\Controllers\Resource\Rest\Store;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    use Index, Store, Show;

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
