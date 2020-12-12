<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialiteUser;
use Auth;

class LoginController extends Controller
{
    public function index(SocialiteUser $socialiteUserModel)
    {
        // 获取是否有第三方用户被设置为管理员
        $count = $socialiteUserModel->where('is_admin', 1)->count();
        // 如果有第三方账号管理员；则通过第三方账号登录
        if ($count) {
            exit('请通过第三方账号登录');
        } else {
            return view('admin.login.index');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('socialite')->logout();

        return redirect(url('admin/login/index'));
    }
}
