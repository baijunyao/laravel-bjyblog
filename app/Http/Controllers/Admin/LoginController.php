<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 登录页面
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin/login/index');
    }

    /**
     * 退出登录
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login/index');
    }


}
