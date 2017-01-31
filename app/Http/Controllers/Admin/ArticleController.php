<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Requests\Article\Store;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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

    /**
     * 配合editormd上传图片的方法
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload_image()
    {
        $result = upload('editormd-image-file', 'uploads/article');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url' => $result['data']['path'].$result['data']['new_name']
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url' => ''
            ];
        }
        return response()->json($data);
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
        $article->addData($data);
        return redirect('admin/article/index');
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
    public function edit()
    {
        echo public_path();die;
        $file = public_path().'/uploads/article/20170129/588dc0e43673a.jpg';
        $image = AddTextWater($file, 'baijunyao.com');
        return $image->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


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
