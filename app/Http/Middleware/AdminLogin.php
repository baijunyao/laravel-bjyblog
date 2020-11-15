<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果登录;则重定向到首页
        if (Auth::guard('admin')->check()) {
            return redirect(url('admin/index/index'));
        }

        return $next($request);
    }
}
