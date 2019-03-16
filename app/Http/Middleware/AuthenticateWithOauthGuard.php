<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateWithOauthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('oauth')->check()) {
            return response('请先登录', 401);
        }

        return $next($request);
    }
}
