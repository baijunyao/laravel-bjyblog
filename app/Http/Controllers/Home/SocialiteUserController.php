<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SocialiteUserController extends Controller
{
    public function show($id)
    {
        if ($id !== 'me') {
            throw new AccessDeniedHttpException('Only query your own information.');
        }

        return response()->json(auth()->guard('socialite')->user()->only('id', 'name', 'avatar', 'email'));
    }
}
