<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Requests\Like\Store;
use App\Models\Article;

class LikeController extends Controller
{
    public function store(Store $request)
    {
        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();
        $socialiteUser->like(Article::find($request->input('article_id')));

        return response()->json('');
    }

    public function destroy(Store $request)
    {
        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();
        $socialiteUser->unLike(Article::find($request->input('article_id')));

        return response()->json('', 201);
    }
}
