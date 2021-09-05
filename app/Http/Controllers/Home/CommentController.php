<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Store;
use App\Models\Comment;
use App\Models\SocialiteUser;
use Illuminate\Http\JsonResponse;
use Str;

class CommentController extends Controller
{
    public function store(Store $request): JsonResponse
    {
        /** @var \App\Models\SocialiteUser $socialite_user */
        $socialite_user = auth()->guard('socialite')->user();
        $email          = $request->input('email', '');

        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            SocialiteUser::where('id', $socialite_user->id)->update([
                'email' => $email,
            ]);
        }

        $parent_id   = (int) $request->input('parent_id');
        $new_comment = $request->only('article_id', 'content', 'parent_id') + [
            'socialite_user_id' => $socialite_user->id,
            'is_audited'        => Str::isTrue(config('bjyblog.comment_audit')) ? 0 : 1,
        ];

        if ($parent_id === 0) {
            $comment = Comment::create($new_comment);
        } else {
            $comment = Comment::where('id', $parent_id)->firstOrFail()->children()->create($new_comment);
        }

        return response()->json(['id' => $comment->id]);
    }
}
