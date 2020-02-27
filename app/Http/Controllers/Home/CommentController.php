<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Store;
use App\Models\Comment;
use App\Models\SocialiteUser;
use Str;

class CommentController extends Controller
{
    public function store(Store $request, Comment $commentModel, SocialiteUser $socialiteUserModel)
    {
        $userId = auth()->guard('socialite')->user()->id;
        $email  = $request->input('email', '');

        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            SocialiteUser::where('id', $userId)->update([
                'email' => $email,
            ]);
        }

        $comment = Comment::create($request->only('article_id', 'content', 'pid') + [
            'socialite_user_id' => $userId,
            'type'              => 1,
            'is_audited'        => Str::isTrue(config('bjyblog.comment_audit')) ? 0 : 1,
        ]);

        return response()->json(['id' => $comment->id]);
    }
}
