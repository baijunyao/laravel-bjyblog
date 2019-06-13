<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Config;
use App\Models\Tag;
use Baijunyao\LaravelUpload\Upload;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Article $articleModel)
    {
        $wd = $request->input('wd', '');

        if (empty($wd)) {
            $id = [];
        } else {
            $id = $articleModel->searchArticleGetId($wd);
        }

        $article = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->when($wd, function ($query) use ($id) {
                return $query->whereIn('id', $id);
            })
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
        $tag      = Tag::all();
        $author   = Config::where('name', 'AUTHOR')->value('value');
        $assign   = compact('category', 'tag', 'author');

        return view('admin.article.create', $assign);
    }

    /**
     * 配合editormd上传图片的方法
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage()
    {
        $result = Upload::image('editormd-image-file', 'uploads/article');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url'     => $result['data'][0]['path'],
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url'     => '',
            ];
        }

        return response()->json($data);
    }

    /**
     * 添加文章
     *
     * @param Store   $request
     * @param Article $article
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request, Article $articleModel)
    {
        $data = $request->except('_token', 'description');

        if ($request->hasFile('cover')) {
            $result = Upload::file('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data'][0]['path'];
            }
        }

        if (empty($data['cover'])) {
            $firstImage    = $articleModel->getCover($data['markdown']);
            $data['cover'] = $firstImage;
        }

        $data['html'] = markdown_to_html($data['markdown']);
        $tag_ids      = $data['tag_ids'];
        unset($data['tag_ids']);
        $article             = Article::create($data);

        if ($article) {
            // 给文章添加标签
            $articleTag = new ArticleTag();
            $articleTag->addTagIds($article->id, $tag_ids);
        }

        return redirect('admin/article/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article          = Article::withTrashed()->find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        $category         = Category::all();
        $tag              = Tag::all();
        $assign           = compact('article', 'category', 'tag');

        return view('admin.article.edit', $assign);
    }

    /**
     * 编辑文章
     *
     * @param Store      $request
     * @param Article    $articleModel
     * @param ArticleTag $articleTagModel
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Store $request, Article $articleModel, ArticleTag $articleTagModel, $id)
    {
        $data           = $request->except('_token');
        $data['is_top'] = $data['is_top'] ?? 0;
        $markdown       = $articleModel->where('id', $id)->value('markdown');
        preg_match_all('/!\[.*\]\((.*.[jpg|jpeg|png|gif]).*\)/i', $markdown, $images);
        // 添加水印 并获取第一张图
        $cover = $articleModel->getCover($data['markdown'], $images[1]);
        // 上传封面图
        if ($request->hasFile('cover')) {
            $result = Upload::file('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data'][0]['path'];
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
        ArticleTag::where('article_id', $id)->forceDelete();

        $articleTagModel->addTagIds($id, $tag_ids);

        $data['slug'] = str_slug($data['title'], '-');
        // 编辑文章
        Article::find($id)->update($data);

        return redirect()->back();
    }

    /**
     * 删除文章
     *
     * @param $id
     * @param Article $articleModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Article $articleModel, ArticleTag $articleTagModel)
    {
        Article::destroy($id);

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
        Article::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    /**
     * 彻底删除文章
     *
     * @param            $id
     * @param Article    $articleModel
     * @param ArticleTag $articleTagModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Article $articleModel, ArticleTag $articleTagModel)
    {
        Article::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back();
    }

    /**
     * 批量替换功能视图
     *
     * @return \Illuminate\View\View
     */
    public function replaceView()
    {
        return view('admin.article.replaceView');
    }

    /**
     * 批量替换功能
     *
     * @param Request $request
     * @param Article $articleModel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replace(Request $request, Article $articleModel)
    {
        $search  = $request->input('search');
        $replace = $request->input('replace');
        $data    = Article::select('id', 'title', 'keywords', 'description', 'markdown', 'html')
            ->where('title', 'like', "%$search%")
            ->orWhere('keywords', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('markdown', 'like', "%$search%")
            ->orWhere('html', 'like', "%$search%")
            ->get();
        foreach ($data as $k => $v) {
            Article::find($v->id)->update([
                'title'       => str_replace($search, $replace, $v->title),
                'keywords'    => str_replace($search, $replace, $v->keywords),
                'description' => str_replace($search, $replace, $v->description),
                'markdown'    => str_replace($search, $replace, $v->markdown),
                'html'        => str_replace($search, $replace, $v->html),
            ]);
        }

        return redirect()->back();
    }
}
