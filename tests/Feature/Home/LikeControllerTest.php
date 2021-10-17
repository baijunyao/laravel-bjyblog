<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

use App\Models\Article;

class LikeControllerTest extends TestCase
{
    protected $urlPrefix = 'likes/';
    protected $storeData = [
        'article_id' => 1,
    ];

    public function testStore()
    {
        $this->UserPost('store', $this->storeData)
            ->assertStatus(200);

        static::assertTrue(auth()->guard('socialite')->user()->hasLiked(Article::find(1)));
    }

    public function testDestroy()
    {
        $this->UserDelete('destroy', $this->storeData)
            ->assertStatus(201);

        static::assertFalse(auth()->guard('socialite')->user()->hasLiked(Article::find(1)));
    }
}
