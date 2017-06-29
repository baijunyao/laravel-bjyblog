<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $articleCount = Article::count();
        $commentCount = Comment::count();
        $chatCount = Chat::count();
        $oauthUserCount = OauthUser::count();
        $assign = compact('articleCount', 'commentCount', 'chatCount', 'oauthUserCount');
        return view('admin/index/index', $assign);
    }

}
