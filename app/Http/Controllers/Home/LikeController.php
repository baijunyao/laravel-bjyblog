<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Like\Store;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    public function store(Store $request): JsonResponse
    {
        /** @var \App\Models\SocialiteUser $socialite_user */
        $socialite_user = auth()->guard('socialite')->user();

        /** @var \App\Models\Article $article */
        $article = Article::findOrFail($request->input('article_id'));
        $socialite_user->like($article);

        return response()->json('');
    }

    public function destroy(Store $request): JsonResponse
    {
        /** @var \App\Models\SocialiteUser $socialite_user */
        $socialite_user = auth()->guard('socialite')->user();
        /** @var \App\Models\Article $article */
        $article = Article::findOrFail($request->input('article_id'));
        $socialite_user->unLike($article);

        return response()->json('', 201);
    }
}
