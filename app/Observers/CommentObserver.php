<?php

namespace App\Observers;

use App\Jobs\SendCommentEmail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\OauthUser;
use Cache;

class CommentObserver extends BaseObserver
{
    public function created($comment)
    {
        $isAdmin = OauthUser::where('id', auth()->guard('oauth')->user()->id)
            ->value('is_admin');
        $name    = auth()->guard('oauth')->user()->name;

        // 获取文章标题
        $title = Article::where('id', $comment->article_id)
            ->withTrashed()
            ->value('title');

        // 给站长发送通知邮件
        if ($isAdmin == 0) {
            $emailAddress = config('bjyblog.notification_email');

            if (!empty($emailAddress)) {
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
                dispatch(new SendCommentEmail($emailAddress, '站长', $subject, $emailData));
            }
        }

        // 给用户发送邮件通知
        if ($comment->pid != 0) {
            $parent_user_id = Comment::where('id', $comment->pid)->value('oauth_user_id');
            $parentData     = OauthUser::select('name', 'email')
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

        parent::created($comment);
    }


    protected function clearCache()
    {
        Cache::forget('common:newComment');
    }
}
