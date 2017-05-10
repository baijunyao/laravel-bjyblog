<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $data = $article->getAdminList();
        $assign = [
            'article' => $data
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request, Article $article)
    {
        $data = $request->except('_token');

        $article->addData($data);
        return redirect('admin/article/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        $category = Category::all();
        $tag = Tag::all();
        $assign = [
            'article' => $article,
            'category' => $category,
            'tag' => $tag
        ];
        return view('admin/article/edit', $assign);

    }

    /**
     * 编辑文章
     *
     * @param Store $request
     * @param Article $articleModel
     * @param ArticleTag $articleTagModel
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Store $request, Article $articleModel, ArticleTag $articleTagModel, $id)
    {
        $data = $request->except('_token');
        $markdown = $articleModel->where('id', $id)->value('markdown');
        preg_match_all('/!\[.*\]\((.*.[jpg|jpeg|png|gif]).*\)/i', $markdown, $images);
        // 获取封面并添加水印
        $data['cover'] = $articleModel->getCover($data['markdown'], $images[1]);
        // 为文章批量添加标签
        $tag_ids = $data['tag_ids'];
        // 把markdown转html
        $data['html'] = markdownToHtml($data['markdown']);
        unset($data['tag_ids']);
        $articleTagModel->addTagIds($id, $tag_ids);
        // 编辑文章
        $map = [
            'id' => $id
        ];
        $articleModel->editData($map, $data);
        return redirect()->back();
    }

    /**
     * 删除文章
     *
     * @param $id
     * @param Article $articleModel
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Article $articleModel)
    {
        $map = [
            'id' => $id
        ];
        $articleModel->deleteData($map);
        return redirect('admin/article/index');
    }
}
