<?php

namespace App\Observers;

use AipImageCensor;
use App\Models\Article;
use App\Models\Comment;
use Notification;
use Str;
use App\Notifications\Comment as CommentNotification;

class CommentObserver extends BaseObserver
{
    public function creating($comment)
    {
        $baiduConfig = [
            config('services.baidu.appid'),
            config('services.baidu.appkey'),
            config('services.baidu.secret'),
        ];

        if (Str::isTrue(config('bjyblog.comment_audit')) && count(array_filter($baiduConfig)) === 3) {
            $baiduClient = new AipImageCensor(config('services.baidu.appid'), config('services.baidu.appkey'), config('services.baidu.secret'));
            $result = $baiduClient->antiSpam($comment->content);

            // spam=0 audited
            $comment->is_audited = $result['result']['spam'] === 0 ? 1 : 0;
        }
    }

    /**
     * @param \App\Models\Comment $comment
     */
    public function created($comment)
    {
        parent::created($comment);

        if (mail_is_configured()) {
            $socialiteUser = auth()->guard('socialite')->user();
            $article = Article::withTrashed()->find($comment->article_id);

            // Send email to admin
            if ($socialiteUser->is_admin === 0) {
                Notification::route('mail', config('bjyblog.notification_email'))
                    ->notify(new CommentNotification($socialiteUser, $article, $comment));
            }

            // Here `$comment->pid` is string
            if (intval($comment->pid) !== 0 && $socialiteUser->id !== $comment->socialite_user_id) {
                // Send email to socialite user
                Notification::route('mail', Comment::find($comment->pid)->socialiteUser->email)
                    ->notify(new CommentNotification($socialiteUser, $article, $comment));
            }
        }
    }
}
