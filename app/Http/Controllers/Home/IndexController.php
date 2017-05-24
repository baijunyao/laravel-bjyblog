<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use DB;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\OauthUser;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
		$article = $articleModel->getHomeList();
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'tagName' => '',
            'title' => '白俊遥博客,技术博客,个人博客模板, php博客系统'
        ];
		return view('home/index/index', $assign);
	}

    /**
     * 文章详情
     *
     * @param $id
     * @param Article $article
     * @param Comment $commentModel
     * @return mixed
     */
    public function article($id, Article $article, Comment $commentModel)
    {
        // 获取文章数据
        $data = $article->getDataById($id);

        // 设置同一个用户访问同一篇文章只增加1个访问量
        $read = request()->cookie('read', []);
        // 判断是否已经记录过id
        if (array_key_exists($id, $read)) {
            // 判断点击本篇文章的时间是否已经超过一天
            if ($read[$id]-time() >= 86400) {
                $read[$id] = time();
                // 文章点击量+1
                $data->increment('click');
            }
        }else{
            $read[$id] = time();
            // 文章点击量+1
            $data->increment('click');
        }

        // 获取上一篇
        $prev = $article
            ->select('id', 'title')
            ->orderBy('created_at', 'asc')
            ->where('id', '>', $id)
            ->limit(1)
            ->first();

        // 获取下一篇
        $next = $article
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->where('id', '<', $id)
            ->limit(1)
            ->first();

        // 获取评论
        $comment = $commentModel->getDataByArticleId($id);
        $assign = [
            'category_id' => $data->category_id,
            'data' => $data,
            'prev' => $prev,
            'next' => $next,
            'comment' => $comment
        ];
        return response()->view('home/index/article', $assign)->cookie('read', $read, 1440);
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
        $categoryName = Category::where('id', $id)->value('name');
        $assign = [
            'category_id' => $id,
            'article' => $article,
            'tagName' => '',
            'title' => $categoryName
        ];
        return view('home/index/index', $assign);
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
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'tagName' => $tagName,
            'title' => $tagName
        ];
        return view('home/index/index', $assign);

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
            'chat' => $chat
        ];
        return view('home/index/chat', $assign);
    }

    /**
     * 开源项目
     *
     * @return mixed
     */
    public function git()
    {
        $assign = [
            'category_id' => 'git'
        ];
        return view('home/index/git', $assign);
    }

    /**
     * 文章评论
     *
     * @param Comment $commentModel
     */
    public function comment(Comment $commentModel, OauthUser $oauthUserModel)
    {
        $data = request()->all();
        if (empty($data['content'])) {
            die('内容不能为空');
        }
        if (empty(session('user.id'))) {
            die('未登录');
        }
        // 限制用户每天最多评论10条
        $date = date('Y-m-d', time());
        $count = $commentModel
            ->where('oauth_user_id', session('user.id'))
            ->whereBetween('created_at', [$date.' 00:00:00', $date.' 23:59:59'])
            ->count();
        if (session('user.is_admin') !=1 && $count > 10) {
            die('每天做多评论10条');
        }
        // 如果用户输入邮箱；则将邮箱记录入oauth_user表中
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $data['email'])) {
            // 获取用户id
            $user_id = session('user.id');

            // 修改邮箱
            $oauthUserMap = [
                'id' => $user_id
            ];
            $oauthUserData = [
                'email' => $data['email']
            ];
            $oauthUserModel->editData($oauthUserMap, $oauthUserData);
            session(['user.email' => $data['email']]);
            unset($data['email']);
        }
        // 存储评论
        $id = $commentModel->addData($data);
        echo $id;
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

    public function search(Article $articleModel){
        $wd = request()->input('wd');
        $map = [
            'title' => ['like', '%'.$wd.'%']
        ];
        $article = $articleModel->getHomeList($map);
        $assign = [
            'category_id' => 'index',
            'article' => $article,
            'tagName' => '',
        ];
        return view('home/index/index', $assign);
    }
}
