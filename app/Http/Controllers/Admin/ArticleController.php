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
        // 上传封面图
        if ($request->hasFile('cover')) {
            $result = upload('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data']['path'].$result['data']['new_name'];
            }
        }
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
        $data['is_top'] = isset($data['is_top']) ? $data['is_top'] : 0;
        $markdown = $articleModel->where('id', $id)->value('markdown');
        preg_match_all('/!\[.*\]\((.*.[jpg|jpeg|png|gif]).*\)/i', $markdown, $images);
        // 添加水印 并获取第一张图
        $cover = $articleModel->getCover($data['markdown'], $images[1]);
        // 上传封面图
        if ($request->hasFile('cover')) {
            $result = upload('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data']['path'].$result['data']['new_name'];
            }
        }
        // 如果没有上传封面图；则使用第一张图片
        if (empty($data['cover'])) {
            $data['cover'] = $cover;
        }
        // 为文章批量添加标签
        $tag_ids = $data['tag_ids'];
        // 把markdown转html
        $data['html'] = markdown_to_html($data['markdown']);
        unset($data['tag_ids']);
        // 先彻底删除此文章下的所有标签
        $articleTagMap = [
            'article_id' => $id
        ];
        $articleTagModel->forceDeleteData($articleTagMap);
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
    public function destroy($id, Article $articleModel, ArticleTag $articleTagModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $articleModel->destroyData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:topArticle');
            Cache::forget('common:tag');

            // 删除文章后先同步删除关联表 article_tags 中的数据
            $map = [
                'article_id' => $id
            ];
            $articleTagModel->destroyData($map);
        }
        return redirect()->back();
    }

    /**
     * 恢复删除的文章
     *
     * @param         $id
     * @param Article $articleModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, Article $articleModel, ArticleTag $articleTagModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $articleModel->restoreData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:topArticle');
            Cache::forget('common:tag');

            // 恢复删除的文章后先同步恢复关联表 article_tags 中的数据
            $map = [
                'article_id' => $id
            ];
            $articleTagModel->restoreData($map);
        }
        return redirect()->back();
    }

    /**
     * 彻底删除文章
     *
     * @param         $id
     * @param Article $articleModel
     * @param ArticleTag $articleTagModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Article $articleModel, ArticleTag $articleTagModel)
    {
        $map = compact('id');
        $result = $articleModel->forceDeleteData($map);
        if ($result) {
            // 删除文章后先同步删除关联表 article_tags 中的数据
            $map = [
                'article_id' => $id
            ];
            $articleTagModel->forceDeleteData($map);
        }
        return redirect()->back();
    }
}
