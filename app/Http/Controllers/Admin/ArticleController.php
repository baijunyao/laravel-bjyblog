<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Config;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ArticleController extends Controller
{
    public function index(Request $request, Article $articleModel)
    {
        $wd = trim($request->input('wd', ''));

        $article = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->when($wd !== '', function ($query) use ($wd) {
                return $query->whereIn('id', Article::getIdsGivenSearchWord($wd));
            })
            ->withTrashed()
            ->paginate(15);
        $assign = compact('article');

        return view('admin.article.index', $assign);
    }

    public function create()
    {
        $category = Category::all();
        $tag      = Tag::all();
        $author   = Config::where('name', 'AUTHOR')->value('value');
        $assign   = compact('category', 'tag', 'author');

        return view('admin.article.create', $assign);
    }

    public function uploadImage(Request $request)
    {
        $result = [
            'success' => 1,
            'message' => 'success',
            'url'     => '',
        ];

        foreach (config('bjyblog.upload_disks') as $disk) {
            $result['url'] = '/' . $request->file('editormd-image-file')->store('uploads/article/' . Date::now()->format('Ymd'), $disk);
        }

        return response()->json($result);
    }

    public function store(Store $request)
    {
        $article = $request->except('_token');

        if ($request->hasFile('cover')) {
            foreach (config('bjyblog.upload_disks') as $disk) {
                $article['cover'] = '/' . $request->file('cover')->store('uploads/article/' . Date::now()->format('Ymd'), $disk);
            }
        }

        $tag_ids = $article['tag_ids'];
        unset($article['tag_ids']);
        $article = Article::create($article);

        $articleTag = new ArticleTag();
        $articleTag->addTagIds($article->id, $tag_ids);

        return redirect(url('admin/article/index'));
    }

    public function edit($id)
    {
        $category = Category::all();
        $tag      = Tag::all();
        $article  = Article::withTrashed()->find($id);
        $article->setAttribute('tag_ids', ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray());

        return view('admin.article.edit', compact('article', 'category', 'tag'));
    }

    public function update(Store $request, ArticleTag $articleTagModel, $id)
    {
        $article = $request->except('_token');

        // 上传封面图
        if ($request->hasFile('cover')) {
            foreach (config('bjyblog.upload_disks') as $disk) {
                $article['cover'] = '/' . $request->file('cover')->store('uploads/article/' . Date::now()->format('Ymd'), $disk);
            }
        }

        $tag_ids = $article['tag_ids'];
        unset($article['tag_ids']);
        $result = Article::withTrashed()->find($id)->update($article);

        if ($result) {
            ArticleTag::where('article_id', $id)->forceDelete();
            $articleTagModel->addTagIds((int) $id, $tag_ids);
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        Article::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        Article::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Article::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back();
    }

    public function replaceView()
    {
        return view('admin.article.replaceView');
    }

    public function replace(Request $request)
    {
        $search   = $request->input('search');
        $replace  = $request->input('replace');
        $articles = Article::select('id', 'title', 'keywords', 'description', 'markdown', 'html')
            ->where('title', 'like', "%$search%")
            ->orWhere('keywords', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('markdown', 'like', "%$search%")
            ->orWhere('html', 'like', "%$search%")
            ->get();

        foreach ($articles as $article) {
            DB::table('articles')->where('id', $article->id)->update([
                'title'       => str_replace($search, $replace, $article->title),
                'keywords'    => str_replace($search, $replace, $article->keywords),
                'description' => str_replace($search, $replace, $article->description),
                'markdown'    => str_replace($search, $replace, $article->markdown),
                'html'        => str_replace($search, $replace, $article->html),
            ]);
        }

        flash_success(translate('Update Success'));

        return redirect()->back();
    }
}
