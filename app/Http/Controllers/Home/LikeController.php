<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Like\Store;
use App\Models\Article;

class LikeController extends Controller
{
    public function store(Store $request)
    {
        auth()->guard('socialite')->user()->like(Article::find($request->input('article_id')));

        return response()->json('');
    }

    public function destroy(Store $request)
    {
        auth()->guard('socialite')->user()->unLike(Article::find($request->input('article_id')));

        return response()->json('', 201);
    }
}
