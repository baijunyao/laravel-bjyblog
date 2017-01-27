<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Requests\Article\Store;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('id', 'desc')->first();
        $assign = [
            'article' => $article
        ];
        return view('admin/article/index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tag = Tag::all();
        $assign = [
            'category' => $category,
            'tag' => $tag
        ];
        return view('admin/article/create', $assign);
    }

    public function upload_image()
    {
        $data = [
            'success' => 1,
            'message' => '上传成功',
            'url' => 'http://laravel-bjyblog.dev/statics/gentelella/production/images/img.jpg'
        ];
        return request()->json($data);
    }

    /**
     * 添加文章
     *
     * @param Store $request
     * @param Article $article
     */
    public function store(Store $request, Article $article)
    {
        $data = $request->except('_token');
        $tmp['content'] = strip_tags($data['content']);

        p($tmp);die;
        $article->addData($tmp);
        die;
        // echo clean($data['content']);die;
        p($data);die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
