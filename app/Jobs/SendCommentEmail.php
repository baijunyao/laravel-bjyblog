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
     * 收件人邮箱地址
     *
     * @var
     */
    protected $email;

    /**
     * 收件人名称
     *
     * @var
     */
    protected $name;

    /**
     * 邮件标题
     *
     * @var
     */
    protected $subject;

    /**
     * 评论内容
     *
     * @var $content
     */
    protected $content;

    /**
     * SendCommentEmail constructor.
     *
     * @param       $email
     * @param       $name
     * @param       $subject
     * @param array $content
     */
    public function __construct($email, $name, $subject, array $content)
    {
        $this->email = $email;
        $this->name = $name;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        send_email($this->email, $this->name, $this->subject, $this->content, 'emails.commentArticle');
    }
}
