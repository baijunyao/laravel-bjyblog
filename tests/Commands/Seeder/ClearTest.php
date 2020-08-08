<?php

declare(strict_types=1);

namespace Tests\Commands\Seeder;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FriendshipLink;
use App\Models\Note;
use App\Models\OpenSource;
use App\Models\SocialiteUser;
use App\Models\Tag;
use Tests\TestCase;

class ClearTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommand()
    {
        $this->artisan('seeder:clear')
            ->expectsConfirmation(translate('Are you sure you want to clear the data?'), 'yes')
            ->assertExitCode(0);

        static::assertEquals(0, ArticleTag::count());
        static::assertEquals(0, Article::count());
        static::assertEquals(0, Category::count());
        static::assertEquals(0, Note::count());
        static::assertEquals(0, Comment::count());
        static::assertEquals(0, SocialiteUser::count());
        static::assertEquals(0, Tag::count());
        static::assertEquals(0, OpenSource::count());
        static::assertEquals(0, FriendshipLink::count());
    }
}
