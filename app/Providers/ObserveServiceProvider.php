<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Friend;
use App\Models\Nav;
use App\Models\Note;
use App\Models\Observers\ArticleObserver;
use App\Models\Observers\CategoryObserver;
use App\Models\Observers\CommentObserver;
use App\Models\Observers\ConfigObserver;
use App\Models\Observers\FriendObserver;
use App\Models\Observers\NavObserver;
use App\Models\Observers\NoteObserver;
use App\Models\Observers\OpenSourceObserver;
use App\Models\Observers\SiteObserver;
use App\Models\Observers\SocialiteClientObserver;
use App\Models\Observers\SocialiteUserObserver;
use App\Models\Observers\TagObserver;
use App\Models\Observers\UserObserver;
use App\Models\OpenSource;
use App\Models\Site;
use App\Models\SocialiteClient;
use App\Models\SocialiteUser;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ObserveServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Article::observe(ArticleObserver::class);
        Category::observe(CategoryObserver::class);
        Note::observe(NoteObserver::class);
        Comment::observe(CommentObserver::class);
        Friend::observe(FriendObserver::class);
        OpenSource::observe(OpenSourceObserver::class);
        Nav::observe(NavObserver::class);
        SocialiteUser::observe(SocialiteUserObserver::class);
        SocialiteClient::observe(SocialiteClientObserver::class);
        Site::observe(SiteObserver::class);
        Tag::observe(TagObserver::class);
        User::observe(UserObserver::class);
        Config::observe(ConfigObserver::class);
    }
}
