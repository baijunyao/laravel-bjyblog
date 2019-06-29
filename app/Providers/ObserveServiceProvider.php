<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\Nav;
use App\Models\Note;
use App\Models\Site;
use App\Models\SocialiteClient;
use App\Models\SocialiteUser;
use App\Models\Tag;
use App\Models\User;
use App\Observers\ArticleObserver;
use App\Observers\CategoryObserver;
use App\Observers\CommentObserver;
use App\Observers\ConfigObserver;
use App\Observers\FriendshipLinkObserver;
use App\Observers\GitProjectObserver;
use App\Observers\NavObserver;
use App\Observers\NoteObserver;
use App\Observers\SiteObserver;
use App\Observers\SocialiteClientObserver;
use App\Observers\SocialiteUserObserver;
use App\Observers\TagObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserveServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Article::observe(ArticleObserver::class);
        Category::observe(CategoryObserver::class);
        Note::observe(NoteObserver::class);
        Comment::observe(CommentObserver::class);
        FriendshipLink::observe(FriendshipLinkObserver::class);
        GitProject::observe(GitProjectObserver::class);
        Nav::observe(NavObserver::class);
        SocialiteUser::observe(SocialiteUserObserver::class);
        SocialiteClient::observe(SocialiteClientObserver::class);
        Site::observe(SiteObserver::class);
        Tag::observe(TagObserver::class);
        User::observe(UserObserver::class);
        Config::observe(ConfigObserver::class);
    }
}
