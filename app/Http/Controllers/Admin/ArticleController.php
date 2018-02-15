<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Config;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->withTrashed()
            ->paginate(15);
        $assign = compact('article');
        return view('admin.article.index', $assign);
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
        $author = Config::where('name', 'AUTHOR')->value('value');
        $assign = compact('category', 'tag', 'author');
        return view('admin.article.create', $assign);
    }

    /**
     * 配合editormd上传图片的方法
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage()
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
        $result = $article->storeData($data);
        if ($result) {
            // 更新热门推荐文章缓存
            Cache::forget('common:topArticle');
            // 更新标签统计缓存
            Cache::forget('common:tag');
        }
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
        $article = Article::withTrashed()->find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        $category = Category::all();
        $tag = Tag::all();
        $assign = compact('article', 'category', 'tag');
        return view('admin.article.edit', $assign);
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
        $data['html'] = markdown_to_html($data['markdown']);
        unset($data['tag_ids']);
        $articleTagModel->addTagIds($id, $tag_ids);
        // 编辑文章
        $map = [
            'id' => $id
        ];
        $result = $articleModel->updateData($map, $data);
        if ($result) {
            // 更新热门推荐文章缓存
            Cache::forget('common:topArticle');
            // 更新标签统计缓存
            Cache::forget('common:tag');
        }
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
        $result = $articleModel->destroyData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:topArticle');
        }
        return redirect('admin/article/index');
    }

    /**
     * 恢复删除的文章
     *
     * @param         $id
     * @param Article $articleModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, Article $articleModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $articleModel->restoreData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:topArticle');
        }
        return redirect('admin/article/index');
    }

    /**
     * 彻底删除文章
     *
     * @param         $id
     * @param Article $articleModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Article $articleModel)
    {
        $articleModel->where('id', $id)->forceDelete();
        return redirect('admin/article/index');
    }
}
