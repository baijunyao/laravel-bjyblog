<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\Comment as CommentModel;
use App\Models\SocialiteUser;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Comment extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var \App\Models\SocialiteUser
     */
    private $socialiteUser;

    /**
     * @var \App\Models\Article
     */
    private $article;

    /**
     * @var \App\Models\Comment
     */
    private $comment;

    public function __construct(SocialiteUser $socialiteUser, Article $article, CommentModel $comment)
    {
        if (intval($comment->pid) === 0) {
            $this->subject = $socialiteUser->name . ' ' . __('Comment') . ' ' . $article->title;
        } else {
            $this->subject = $socialiteUser->name . ' ' . __('Reply') . ' ' . $article->title;
        }

        $this->socialiteUser = $socialiteUser;
        $this->article       = $article;
        $this->comment       = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        if (mail_is_configured()) {
            return ['mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject($this->subject)
            ->line(new HtmlString($this->comment->content))
            ->action(__('Click for details.'), $this->article->url . '#comment-' . $this->comment->id);
    }
}
