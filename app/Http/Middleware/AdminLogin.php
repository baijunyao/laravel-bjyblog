<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果登录;则重定向到首页
        if (session('user.is_admin') == 1) {
            return redirect('admin/index/index');
        }
        return $next($request);
    }
}
