<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Article;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\OauthUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return mixed
     */
    public function index(Comment $commentModel)
    {
        // 文章总数
        $articleCount = Article::count();
        // 评论总数
        $commentCount = Comment::count();
        // 随言碎语总数
        $chatCount = Chat::count();
        // 用户总数
        $oauthUserCount = OauthUser::count();
        // 最新登录的5个用户
        $oauthUserData = OauthUser::select('name', 'avatar', 'login_times', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        // 最新的5条评论
        $commentData = $commentModel->getNewData(5);
        $version = [
            'system' => PHP_OS,
            'webServer' => $_SERVER['SERVER_SOFTWARE'],
            'php' => PHP_VERSION,
            'mysql' => DB::select('SHOW VARIABLES LIKE "version"')[0]->Value
        ];
        $assign = compact('articleCount', 'commentCount', 'chatCount', 'oauthUserCount', 'oauthUserData', 'commentData', 'version');
        return view('admin.index.index', $assign);
    }

}
