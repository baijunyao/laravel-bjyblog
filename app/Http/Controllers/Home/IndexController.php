<?php

namespace App\Http\Controllers\Home;

use Agent;
use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Store;
use App\Models\Article;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\OauthUser;
use App\Models\Tag;
use Cache;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 首页
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 获取文章列表数据
        $article = Article::select(
                'id', 'category_id', 'title',
                'slug', 'author', 'description',
                'cover', 'is_top', 'created_at'
            )
            ->orderBy('created_at', 'desc')
            ->with(['category', 'tags'])
            ->paginate(10);
        $head = [
            'title'       => config('bjyblog.head.title'),
            'keywords'    => config('bjyblog.head.keywords'),
            'description' => config('bjyblog.head.description'),
        ];
        $assign = [
            'category_id' => 'index',
            'article'     => $article,
            'head'        => $head,
            'tagName'     => '',
        ];

        return view('home.index.index', $assign);
    }

    /**
     * 文章详情
     *
     * @param         $id
     * @param Request $request
     * @param Comment $commentModel
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function article($id, Request $request, Comment $commentModel)
    {
        // 获取文章数据
        $data = Article::with(['category', 'tags'])->find($id);
        if ($data === null) {
            return abort(404);
        }
        // 同一个用户访问同一篇文章每天只增加1个访问量  使用 ip+id 作为 key 判别
        $ipAndId = 'articleRequestList' . $request->ip() . ':' . $id;
        if (!Cache::has($ipAndId)) {
            cache([$ipAndId => ''], 1440);
            // 文章点击量+1
            $data->increment('click');
        }

        // 获取上一篇
        $prev = Article::select('id', 'title', 'slug')
            ->orderBy('created_at', 'desc')
            ->where('id', '<', $id)
            ->limit(1)
            ->first();

        // 获取下一篇
        $next = Article::select('id', 'title', 'slug')
            ->orderBy('created_at', 'asc')
            ->where('id', '>', $id)
            ->limit(1)
            ->first();

        // 获取评论
        $comment = $commentModel->getDataByArticleId($id);
        // p($comment);die;
        $category_id = $data->category->id;
        $assign      = compact('category_id', 'data', 'prev', 'next', 'comment');

        return view('home.index.article', $assign);
    }

    /**
     * 获取分类下的文章
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function category($id)
    {
        // 获取分类数据
        $category = Category::select('id', 'name', 'keywords', 'description')
            ->where('id', $id)
            ->first();
        if ($category === null) {
            return abort(404);
        }
        // 获取分类下的文章
        $article = $category->articles()
            ->orderBy('created_at', 'desc')
            ->with('tags')
            ->paginate(10);
        // 为了和首页共用 html ； 此处手动组合分类数据
        if ($article->isNotEmpty()) {
            $article->setCollection(
                collect(
                    $article->items()
                )->map(function ($v) use ($category) {
                    $v->category = $category;

                    return $v;
                })
            );
        }

        $head = [
            'title'       => $category->name,
            'keywords'    => $category->keywords,
            'description' => $category->description,
        ];
        $assign = [
            'category_id' => $id,
            'article'     => $article,
            'tagName'     => '',
            'title'       => $category->name,
            'head'        => $head,
        ];

        return view('home.index.index', $assign);
    }

    /**
     * 获取标签下的文章
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function tag($id)
    {
        // 获取标签
        $tag = Tag::select('id', 'name')->where('id', $id)->first();
        if ($tag === null) {
            return abort(404);
        }
        // TODO 不取 markdown 和 html 字段
        // 获取标签下的文章
        $article = $tag->articles()
            ->orderBy('created_at', 'desc')
            ->with(['category', 'tags'])
            ->paginate(10);
        $head = [
            'title'       => $tag->name,
            'keywords'    => '',
            'description' => '',
        ];
        $assign = [
            'category_id' => 'index',
            'article'     => $article,
            'tagName'     => $tag->name,
            'title'       => $tag->name,
            'head'        => $head,
        ];

        return view('home.index.index', $assign);
    }

    /**
     * 随言碎语
     *
     * @return mixed
     */
    public function chat()
    {
        $chat   = Chat::orderBy('created_at', 'desc')->get();
        $assign = [
            'category_id' => 'chat',
            'chat'        => $chat,
            'title'       => '随言碎语',
        ];

        return view('home.index.chat', $assign);
    }

    /**
     * 开源项目
     *
     * @return mixed
     */
    public function git()
    {
        $assign = [
            'category_id' => 'git',
            'title'       => '开源项目',
        ];

        return view('home.index.git', $assign);
    }

    /**
     * 文章评论
     *
     * @param Store     $request
     * @param Comment   $commentModel
     * @param OauthUser $oauthUserModel
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function comment(Store $request, Comment $commentModel, OauthUser $oauthUserModel)
    {
        // 获取用户id
        $userId = auth()->guard('oauth')->user()->id;
        // 如果用户输入邮箱；则将邮箱记录入oauth_user表中
        $email = $request->input('email', '');

        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            // 修改邮箱
            OauthUser::where('id', $userId)->update([
                'email' => $email,
            ]);
        }

        // 存储评论
        $id = Comment::create($request->only('article_id', 'content', 'pid') + [
            'oauth_user_id' => $userId,
            'type'          => 1,
            'status'        => 1,
        ]);

        if (!$id) {
            return ajax_return(500);
        }

        return ajax_return(200, ['id' => $id]);
    }

    /**
     * 检测是否登录
     */
    public function checkLogin()
    {
        return response()->json([
            'status' => (int) auth()->guard('oauth')->check(),
        ]);
    }

    /**
     * 搜索文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, Article $articleModel)
    {
        // 禁止蜘蛛抓取搜索页
        if (Agent::isRobot()) {
            abort(404);
        }

        $wd = clean($request->input('wd'));

        $id = $articleModel->searchArticleGetId($wd);

        // 获取文章列表数据
        $article = Article::select(
                'id', 'category_id', 'title',
                'author', 'description', 'cover',
                'is_top', 'created_at'
            )
            ->whereIn('id', $id)
            ->orderBy('created_at', 'desc')
            ->with(['category', 'tags'])
            ->paginate(10);
        $head = [
            'title'       => $wd,
            'keywords'    => '',
            'description' => '',
        ];
        $assign = [
            'category_id' => 'index',
            'article'     => $article,
            'tagName'     => '',
            'title'       => $wd,
            'head'        => $head,
        ];

        // 增加 X-Robots-Tag 用于禁止搜搜引擎抓取搜索结果页面 防止利用搜索结果页生成恶意广告
        return response()->view('home.index.index', $assign)
            ->header('X-Robots-Tag', 'noindex');
    }

    /**
     * feed
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function feed()
    {
        // 获取文章
        $article = Cache::remember('feed:article', 10080, function () {
            return Article::select('id', 'author', 'title', 'description', 'html', 'created_at')
                ->latest()
                ->get();
        });

        $feed              = App::make('feed');
        $feed->title       = config('app.name');
        $feed->description = config('bjyblog.head.description');
        $feed->logo        = asset('uploads/avatar/1.jpg');
        $feed->link        = url('feed');
        $feed->setDateFormat('carbon');
        $feed->pubdate     = $article->first()->created_at;
        $feed->lang        = config('app.locale');
        $feed->ctype       = 'application/xml';

        foreach ($article as $v) {
            $feed->add($v->title, $v->author, url('article', $v->id), $v->created_at, $v->description);
        }

        return $feed->render('atom');
    }
}
