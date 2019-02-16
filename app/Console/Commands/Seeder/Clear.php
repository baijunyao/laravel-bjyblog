<?php

namespace App\Console\Commands\Seeder;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\OauthUser;
use App\Models\Tag;
use Artisan;
use Illuminate\Console\Command;

class Clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear seeder data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ArticleTag::truncate();
        Article::truncate();
        Category::truncate();
        Chat::truncate();
        Comment::truncate();
        OauthUser::truncate();
        Tag::truncate();
        GitProject::truncate();
        FriendshipLink::truncate();

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('queue:restart');
        $this->info('successfully');
    }
}
