<?php

namespace Tests\Feature\Home;

use App\Jobs\SendCommentEmail;
use App\Models\Comment;
use Bus;

class IndexControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')->assertStatus(200);
    }

    public function testArticle()
    {
        $this->get('/article/1')->assertStatus(200);
    }

    public function testCategory()
    {
        $this->get('/category/1')->assertStatus(200);
    }

    public function testTag()
    {
        $this->get('/tag/1')->assertStatus(200);
    }

    public function testChat()
    {
        $this->get('/chat')->assertStatus(200);
    }

    public function testGit()
    {
        $this->get('/git')->assertStatus(200);
    }

    public function testComment()
    {
        Bus::fake();

        $content = '评论666<img src="http://baijunyao.com/statics/emote/tuzki/3.gif" title="Yeah" alt="test">';
        $comment = [
            'article_id' => 1,
            'pid'        => 1,
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

        Bus::assertDispatched(SendCommentEmail::class, function ($job) {
            return $job->content['type'] === '评论';
        });

        Bus::assertDispatched(SendCommentEmail::class, function ($job) {
            return $job->content['type'] === '回复';
        });
    }

    public function testCommentEmptyContent()
    {
        $comment = [
            'article_id' => 1,
            'pid'        => 0,
            'content'    => '',
        ];
        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }

    public function testCommentInvalidContent()
    {
        $comment = [
            'article_id' => 1,
            'pid'        => 0,
            'content'    => 'test',
        ];
        $this->loginByUserId(1)
            ->post('/comment', $comment)
            ->assertStatus(302);
    }

    public function testCommentNotLoggedIn()
    {
        $comment = [
            'article_id' => 1,
            'pid'        => 0,
            'content'    => '评论666',
        ];
        $this->post('/comment', $comment)->assertStatus(401);
    }

    public function testCheckLoginWhenLogin()
    {
        auth()->guard('oauth')->loginUsingId(1);

        $this->get('/checkLogin')->assertStatus(200)->assertJson([
            'status' => 1,
        ]);
    }

    public function testCheckLoginWhenLogout()
    {
        $this->get('/checkLogin')->assertStatus(200)->assertJson([
            'status' => 0,
        ]);
    }

    public function testSearch()
    {
        $this->call('POST', '/search', [
            'wd' => '序言',
        ])->assertStatus(200);
    }

    public function testFeed()
    {
        $this->get('/feed')->assertStatus(200);
    }
}
