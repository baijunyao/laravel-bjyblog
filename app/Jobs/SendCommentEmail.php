<?php

namespace App\Jobs;

use App\Models\OauthUser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 收件人信息
     *
     * @var OauthUser
     */
    protected $oauthUser;

    /**
     * 评论内容
     *
     * @var $content
     */
    protected $content;

    /**
     * SendCommentEmail constructor.
     *
     * @param OauthUser $oauthUser
     * @param array     $content
     */
    public function __construct(OauthUser $oauthUser, array $content)
    {
        $this->oauthUser = $oauthUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $oauthUser = $this->oauthUser;
        $content = $this->content;
        send_email($oauthUser->email, $oauthUser->name, $content['subject'], $content, 'emails.commentArticle');
    }
}
