<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
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
            return route('login');
        }

        return null;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param array<int,string>        $guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        if (current($guards) === 'admin') {
            $redirect_to = $request->expectsJson() === false ? url('admin/login/index') : null;
        } else {
            $redirect_to = $this->redirectTo($request);
        }

        throw new AuthenticationException('Unauthenticated.', $guards, $redirect_to);
    }
}
