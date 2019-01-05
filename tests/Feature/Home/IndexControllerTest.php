<?php

namespace Tests\Feature\Home;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testArticle()
    {
        $response = $this->get('/article/1');
        $response->assertStatus(200);
    }

    public function testCategory()
    {
        $response = $this->get('/category/1');
        $response->assertStatus(200);
    }

    public function testTag()
    {
        $response = $this->get('/tag/1');
        $response->assertStatus(200);
    }

    public function testChat()
    {
        $response = $this->get('/chat');
        $response->assertStatus(200);
    }

    public function testGit()
    {
        $response = $this->get('/git');
        $response->assertStatus(200);
    }

    public function testComment()
    {
        $comment = [
            'article_id' => 1,
            'pid' => 0,
            'content' => '评论666'
        ];
        $response = $this->loginByUserId(1)->post('/comment', $comment);
        $response->assertStatus(200);
    }

    public function testCheckLogin()
    {
        $response = $this->get('/checkLogin');
        $response->assertStatus(200);
    }

    public function testSearch()
    {
        $word = '序言';
        $response = $this->call('POST', '/search', [
            'wd' => $word
        ]);
        $response->assertStatus(200);
    }

    public function testFeed()
    {
        $response = $this->get('/feed');
        $response->assertStatus(200);
    }

    public function testTest()
    {
        $response = $this->get('test');
        $response->assertStatus(200);
    }
}
