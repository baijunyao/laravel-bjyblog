<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Comment\Store;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\Config;
use App\Models\OauthUser;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class IndexController extends Controller
{
    /**
     * 首页
     *
     * @param Article $articleModel
     * @return mixed
     */
    public function index(Article $articleModel)
	{
	    // 获取文章列表数据
        $article = $articleModel->getHomeList();
        $config = cache('config');
        $head = [
            'title' => $config->get('WEB_TITLE'),
            'keywords' => $config->get('WEB_KEYWORDS'),
            'description' => $config->get('WEB_DESCRIPTION'),
        ];
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'head' => $head,
            'tagName' => ''
        ];
		return view('home.index.index', $assign);
	}

    /**
     * 文章详情
     *
     * @param         $id
     * @param Article $articleModel
     * @param Comment $commentModel
     *
     * @return $this
     */
    public function article($id, Request $request, Article $articleModel, Comment $commentModel)
    {
        // 获取文章数据
        $data = $articleModel->getDataById($id);
        if (is_null($data)) {
            return abort(404);
        }
        // 去掉描述中的换行
        $data->description = str_replace(["\r", "\n", "\r\n"], '', $data->description);
        // 同一个用户访问同一篇文章每天只增加1个访问量  使用 ip+id 作为 key 判别
        $ipAndId = 'articleRequestList'.$request->ip().':'.$id;
        if (!Cache::has($ipAndId)) {
            cache([$ipAndId => ''], 1440);
            // 文章点击量+1
            $data->increment('click');
        }

        // 获取上一篇
        $prev = $articleModel
            ->select('id', 'title')
            ->orderBy('created_at', 'asc')
            ->where('id', '>', $id)
            ->limit(1)
            ->first();

        // 获取下一篇
        $next = $articleModel
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->where('id', '<', $id)
            ->limit(1)
            ->first();

        // 获取评论
        $comment = $commentModel->getDataByArticleId($id);
        $category_id = $data->category_id;
        $assign = compact('category_id', 'data', 'prev', 'next', 'comment');
        return view('home.index.article', $assign);
    }

    /**
     * 获取栏目下的文章
     *
     * @param Article $articleModel
     * @param $id
     * @return mixed
     */
    public function category(Article $articleModel, $id)
    {
        $map = [
            'articles.category_id' => $id
        ];
        $article = $articleModel->getHomeList($map);
        $category = Category::find($id);
        $head = [
            'title' => $category->name,
            'keywords' => $category->keywords,
            'description' => $category->description,
        ];
        $assign = [
            'category_id' => $id,
            'article' => $article,
            'tagName' => '',
            'title' => $category->name,
            'head' => $head
        ];
        return view('home.index.index', $assign);
    }

    /**
     * 获取标签下的文章
     *
     * @param $id
     * @param Article $articleModel
     * @return mixed
     */
    public function tag($id, Article $articleModel)
    {
        // 获取标签名
        $tagName = Tag::where('id', $id)->value('name');
        // 获取此标签下的文章id
        $articleIds = ArticleTag::where('tag_id', $id)
            ->pluck('article_id')
            ->toArray();
        // 获取文章数据
        $map = [
            'articles.id' => ['in', $articleIds]
        ];
        $article = $articleModel->getHomeList($map);
        $head = [
            'title' => $tagName,
            'keywords' => '',
            'description' => '',
        ];
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'tagName' => $tagName,
            'title' => $tagName,
            'head' => $head
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
        $chat = Chat::orderBy('created_at', 'desc')->get();
        $assign =[
            'category_id' => 'chat',
            'chat' => $chat,
            'title' => '随言碎语',
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
            'title' => '开源项目',
        ];
        return view('home.index.git', $assign);
    }

    /**
     * 文章评论
     *
     * @param Comment $commentModel
     */
    public function comment(Store $request, Comment $commentModel, OauthUser $oauthUserModel)
    {
        $data = $request->only('content', 'email', 'article_id', 'pid');
        // 获取用户id
        $userId = session('user.id');
        // 如果用户输入邮箱；则将邮箱记录入oauth_user表中
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $data['email'])) {
            // 修改邮箱
            $oauthUserMap = [
                'id' => $userId
            ];
            $oauthUserData = [
                'email' => $data['email']
            ];
            $oauthUserModel->updateData($oauthUserMap, $oauthUserData);
            session(['user.email' => $data['email']]);
            unset($data['email']);
        }
        // 存储评论
        $id = $commentModel->storeData($data);
        // 更新缓存
        Cache::forget('common:newComment');
        return ajax_return(200, ['id' => $id]);
    }

    /**
     * 检测是否登录
     */
    public function checkLogin()
    {
        if (empty(session('user.id'))) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * 搜索文章
     *
     * @param Article $articleModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Article $articleModel){
        $wd = request()->input('wd');
        $map = [
            'title' => ['like', '%'.$wd.'%']
        ];
        $article = $articleModel->getHomeList($map);
        $head = [
            'title' => $wd,
            'keywords' => '',
            'description' => '',
        ];
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'tagName' => '',
            'title' => $wd,
            'head' => $head
        ];
        return view('home.index.index', $assign);
    }

    /**
     * 用于做测试的方法
     */
    public function test()
    {
        
    }


}
