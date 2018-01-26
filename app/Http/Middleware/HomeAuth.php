<?php

namespace App\Http\Middleware;

use Closure;

class HomeAuth
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
        // 屏蔽未登录的访问
        if (! session()->has('user')) {
            die('未登录');
        }
        return $next($request);
    }
}
