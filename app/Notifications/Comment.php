<?php

declare(strict_types=1);

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
    public $subject;

    /**
     * @var \App\Models\SocialiteUser
     */
    public $socialiteUser;

    /**
     * @var \App\Models\Article
     */
    public $article;

    /**
     * @var \App\Models\Comment
     */
    public $comment;

    public function __construct(SocialiteUser $socialiteUser, Article $article, CommentModel $comment)
    {
        if (intval($comment->parent_id) === 0) {
            $this->subject = $socialiteUser->name . ' ' . translate('Comment') . ' ' . $article->title;
        } else {
            $this->subject = $socialiteUser->name . ' ' . translate('Reply') . ' ' . $article->title;
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
     * @return array<int,string>
     */
    public function via($notifiable): array
    {
        if (mail_is_configured()) {
            return ['mail'];
        }

        return [];
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
            ->action(translate('Click for details.'), $this->article->url . '#comment-' . $this->comment->id);
    }
}
