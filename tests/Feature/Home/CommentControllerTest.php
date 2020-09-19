<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

use App\Models\Comment;
use App\Models\SocialiteUser;
use App\Notifications\Comment as CommentNotification;
use DB;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;
use Str;

class CommentControllerTest extends TestCase
{
    public function testStore()
    {
        Notification::fake();
        $this->setupEmail();

        $content = '评论666<img src="http://baijunyao.com/statics/emote/tuzki/3.gif" title="Yeah" alt="test">';
        $email   = 'comment@test.com';
        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
        ];

        $this->loginByUserId(1)
            ->post('/comment', $comment + [
                'content' => $content,
                'email'   => $email,
            ])
            ->assertStatus(200);

        $this->assertDatabaseHas('comments', [
            'article_id' => 1,
            'parent_id'  => null,
            'content'    => (new Comment())->imageToUbb($content),
        ]);

        static::assertEquals($email, SocialiteUser::where('id', 1)->value('email'));

        Notification::assertSentTo(new AnonymousNotifiable(), CommentNotification::class, function (CommentNotification $notification) {
            return $notification->subject === '白俊遥 评论 欢迎使用 laravel-bjyblog';
        });

        $this->loginByUserId(1)
            ->post('/comment', $comment + [
                'content' => $content,
                'email'   => $email,
            ])
            ->assertStatus(302);
    }

    public function testStoreReply()
    {
        Notification::fake();
        $this->setupEmail();

        Comment::where('id', 1)->update([
            'socialite_user_id' => 2,
        ]);
        $socialiteUser1 = SocialiteUser::withTrashed()->find(1);
        $socialiteUser1->update([
            'is_admin' => 1,
        ]);
        $socialiteUser2 = SocialiteUser::withTrashed()->find(2);
        $socialiteUser2->update([
            'deleted_at' => null,
        ]);

        $content = '评论666<img src="http://baijunyao.com/statics/emote/tuzki/3.gif" title="Yeah" alt="test">';
        $email   = 'comment@test.com';
        $comment = [
            'article_id' => 1,
            'parent_id'  => 1,
        ];

        $this->loginByUserId($socialiteUser1->id)
            ->post('/comment', $comment + [
                'content' => $content,
                'email'   => $email,
            ])
            ->assertStatus(200);

        $this->assertDatabaseHas('comments', $comment + [
            'content' => (new Comment())->imageToUbb($content),
        ]);

        Notification::assertSentTo($socialiteUser2, CommentNotification::class, function (CommentNotification $notification) {
            return $notification->subject === '白俊遥 回复 欢迎使用 laravel-bjyblog';
        });
    }

    public function testStoreNoMailConfigured()
    {
        Notification::fake();

        $content = '评论666<img src="http://baijunyao.com/statics/emote/tuzki/3.gif" title="Yeah" alt="test">';
        $comment = [
            'article_id' => 1,
            'parent_id'  => 1,
        ];

        /** For @see \App\Observers\CommentObserver::created() */
        config([
            'bjyblog.notification_email' => 'test@test.com',
        ]);

        $this->loginByUserId(1)
            ->post('/comment', $comment + [
                'content' => $content,
            ])
            ->assertStatus(200);

        $this->assertDatabaseHas('comments', $comment + [
            'content' => (new Comment())->imageToUbb($content),
        ]);

        Notification::assertNotSentTo(new AnonymousNotifiable(), CommentNotification::class);
    }

    public function testStoreBaiduSdkNoConfiguration()
    {
        config([
            'bjyblog.comment_audit' => true,
        ]);

        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => 'no audited comment',
        ];
        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(200);

        static::assertDatabaseHas('comments', [
            'content'    => 'no audited comment',
            'is_audited' => 0,
        ]);
    }

    public function testStoreWithBlockedUser()
    {
        SocialiteUser::where('id', 1)->update([
            'is_blocked' => 1,
        ]);

        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => 'Comment Content',
        ];

        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }

    public function testStoreEmptyContent()
    {
        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => '',
        ];
        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }

    public function testStoreInvalidContent()
    {
        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => 'test',
        ];
        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }

    public function testStoreNotLoggedIn()
    {
        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => '评论666',
        ];
        $this->post('/comment', $comment)->assertStatus(401);
    }

    public function testCommentsRestricted()
    {
        for ($i = 0; $i < 10; $i++) {
            $comment = [
                'article_id' => 1,
                'parent_id'  => 0,
                'content'    => Str::random(),
            ];

            $this->loginByUserId(1)
                ->post('/comment', $comment)
                ->assertOk();

            DB::table('comments')->update([
                'created_at' => Date::now()->addMinutes(10),
            ]);
        }

        $comment = [
            'article_id' => 1,
            'parent_id'  => 0,
            'content'    => Str::random(),
        ];

        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }
}
