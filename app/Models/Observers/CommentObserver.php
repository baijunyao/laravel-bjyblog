<?php

namespace App\Models\Observers;

use AipContentCensor;
use App\Models\Article;
use App\Models\Comment;
use App\Models\SocialiteUser;
use Notification;
use Str;
use App\Notifications\Comment as CommentNotification;

class CommentObserver extends BaseObserver
{
    public function creating(Comment $comment): void
    {
        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        if (Str::isFalse(config('bjyblog.comment_audit')) || $socialiteUser->is_admin === 1 || Str::contains($comment->content, '赞赏')) {
            $comment->is_audited = 1;
        } else {
            $baiduConfig = [
                config('services.baidu.appid'),
                config('services.baidu.appkey'),
                config('services.baidu.secret'),
            ];

            if (count(array_filter($baiduConfig)) === 3) {
                $baiduClient = new AipContentCensor(config('services.baidu.appid'), config('services.baidu.appkey'), config('services.baidu.secret'));
                $result = $baiduClient->textCensorUserDefined($comment->content);

                // conclusionType=1 audited
                $comment->is_audited = isset($result['conclusionType']) && $result['conclusionType'] === 1 ? 1 : 0;
            } else {
                $comment->is_audited = 0;
            }
        }
    }

    public function created(Comment $comment): void
    {
        if (mail_is_configured()) {
            /** @var \App\Models\SocialiteUser $socialiteUser */
            $socialiteUser = auth()->guard('socialite')->user();

            /** @var \App\Models\Article $article */
            $article = Article::withTrashed()->where('id', $comment->article_id)->firstOrFail();

            // Send email to admin
            if ($socialiteUser->is_admin === 0) {
                Notification::route('mail', config('bjyblog.notification_email'))
                    ->notify(new CommentNotification($socialiteUser, $article, $comment));
            }

            // Here `$comment->parent_id` is string
            if (intval($comment->parent_id) !== 0) {
                $parentComment = Comment::findOrFail($comment->parent_id);

                if ($socialiteUser->id !== $parentComment->socialite_user_id) {
                    assert($parentComment->socialiteUser instanceof SocialiteUser);

                    // Send email to socialite user
                    $parentComment->socialiteUser->notify(new CommentNotification($socialiteUser, $article, $comment));
                }
            }
        }
    }
}
