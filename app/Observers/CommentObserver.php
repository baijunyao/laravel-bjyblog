<?php

namespace App\Observers;

use AipImageCensor;
use App\Jobs\SendCommentEmail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\SocialiteUser;

class CommentObserver extends BaseObserver
{
    public function creating($comment)
    {
        $baiduConfig = [
            config('services.baidu.appid'),
            config('services.baidu.appkey'),
            config('services.baidu.secret'),
        ];

        if (is_true(config('bjyblog.comment_audit')) && count(array_filter($baiduConfig)) === 3) {
            $baiduClient = new AipImageCensor(config('services.baidu.appid'), config('services.baidu.appkey'), config('services.baidu.secret'));
            $result = $baiduClient->antiSpam($comment->content);

            // spam=0 audited
            $comment->is_audited = $result['result']['spam'] === 0 ? 1 : 0;
        }
    }

    public function created($comment)
    {
        parent::created($comment);

        $emailConfig = [
            config('mail.host'),
            config('mail.username'),
            config('mail.password'),
            config('mail.from.address'),
            config('mail.from.name'),
            config('bjyblog.notification_email'),
        ];

        if (count(array_filter($emailConfig)) === 6) {

            $isAdmin = SocialiteUser::where('id', auth()->guard('socialite')->user()->id)
                ->value('is_admin');
            $name    = auth()->guard('socialite')->user()->name;

            // 获取文章标题
            $title = Article::where('id', $comment->article_id)
                ->withTrashed()
                ->value('title');

            $notificationEmail = config('bjyblog.notification_email');

            // 给站长发送通知邮件
            if ($isAdmin === 0 && !empty($notificationEmail)) {
                $emailData = [
                    'name'    => '站长',
                    'user'    => $name,
                    'date'    => date('Y-m-d H:i:s'),
                    'type'    => '评论',
                    'url'     => url('article', [$comment->article_id]) . '#comment-' . $comment->id,
                    'title'   => $title,
                    'content' => $comment->ubbToImage($comment->content),
                ];
                $subject = $name . '评论了 ' . $title;
                dispatch(new SendCommentEmail($notificationEmail, '站长', $subject, $emailData));
            }

            // 给用户发送邮件通知
            if (intval($comment->pid) !== 0) {
                $parent_user_id = Comment::where('id', $comment->pid)->value('socialite_user_id');
                $parentData     = SocialiteUser::select('name', 'email')
                    ->where('id', $parent_user_id)
                    ->first()
                    ->toArray();
                if (!empty($parentData['email'])) {
                    $emailData = [
                        'name'    => $parentData['name'],
                        'user'    => $name,
                        'date'    => date('Y-m-d H:i:s'),
                        'type'    => '回复',
                        'url'     => url('article', [$comment->article_id]) . '#comment-' . $comment->id,
                        'title'   => $title,
                        'content' => $comment->ubbToImage($comment->content),
                    ];
                    $subject = $name . '评论了 ' . $title;
                    dispatch(new SendCommentEmail($parentData['email'], $parentData['name'], $subject, $emailData));
                }
            }
        }
    }
}
