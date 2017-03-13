<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\ArticleTag;
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
            'title_word' => ''
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
        return view('home/index/article', $assign);
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
        $assign = [
            'category_id' => $id,
            'article' => $article,
            'title_word' => ''
        ];
        return view('home/index/index', $assign);
    }

    public function tag($id, Article $articleModel)
    {
        $article_id = ArticleTag::where('tag_id', $id)
            ->pluck('article_id')
            ->toArray();
        $map = [
            'whereIn', 'articles.id', $article_id
        ];
        $data = $articleModel->getHomeList($map);
        p($data);

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

}
