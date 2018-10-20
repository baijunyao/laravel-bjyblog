<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (Auth::guard('admin')->check()) {
            return redirect('admin/index/index');
        }
        return $next($request);
    }
}
