<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
}
