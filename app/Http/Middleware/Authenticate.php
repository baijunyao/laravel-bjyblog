<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @var array<int,string>
     */
    private $guards = [];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string[]                 ...$guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (current($this->guards) === 'admin') {
                return url('admin/login/index');
            } else {
                return route('login');
            }
        }
    }
}
