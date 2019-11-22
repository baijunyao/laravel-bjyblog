<?php

namespace Tests\Commands\Seeder;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\Note;
use App\Models\SocialiteUser;
use App\Models\Tag;
use Artisan;
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
        Artisan::call('seeder:clear');

        static::assertEquals(0, ArticleTag::count());
        static::assertEquals(0, Article::count());
        static::assertEquals(0, Category::count());
        static::assertEquals(0, Note::count());
        static::assertEquals(0, Comment::count());
        static::assertEquals(0, SocialiteUser::count());
        static::assertEquals(0, Tag::count());
        static::assertEquals(0, GitProject::count());
        static::assertEquals(0, FriendshipLink::count());
    }
}
