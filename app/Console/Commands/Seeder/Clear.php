<?php

declare(strict_types=1);

namespace App\Console\Commands\Seeder;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FriendshipLink;
use App\Models\Note;
use App\Models\OpenSource;
use App\Models\SocialiteUser;
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

    public function handle(): int
    {
        if ($this->confirm(translate('Are you sure you want to clear the data?'))) {
            ArticleTag::truncate();
            Article::truncate();
            Category::truncate();
            Note::truncate();
            Comment::truncate();
            SocialiteUser::truncate();
            Tag::truncate();
            OpenSource::truncate();
            FriendshipLink::truncate();

            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('queue:restart');
            $this->info('successfully');
        }

        return 0;
    }
}
