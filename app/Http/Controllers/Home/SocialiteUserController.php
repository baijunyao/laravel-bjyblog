<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SocialiteUserController extends Controller
{
    public function show(string $id): JsonResponse
    {
        if ($id !== 'me') {
            throw new AccessDeniedHttpException('Only query your own information.');
        }

        /** @var \App\Models\SocialiteUser|null $user */
        $user = auth()->guard('socialite')->user();

        if ($user === null) {
            throw new AuthenticationException('Unauthenticated.', ['socialite']);
        }

        return response()->json($user->only('id', 'name', 'avatar', 'email'));
    }
}
