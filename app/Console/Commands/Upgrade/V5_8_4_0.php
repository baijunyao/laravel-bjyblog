<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Article;
use App\Models\Category;
use App\Models\Config;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_4_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.4.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.4.0';

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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug')->default('')->after('title')->comment('slug');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug')->default('')->after('name')->comment('slug');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->default('')->after('name')->comment('slug');
        });

        Article::withTrashed()->get()->map(function ($article) {
            $article->update([
                'slug' => generate_english_slug($article->title),
            ]);
        });

        Category::withTrashed()->get()->map(function ($category) {
            $category->update([
                'slug' => generate_english_slug($category->name),
            ]);
        });

        Tag::withTrashed()->get()->map(function ($tag) {
            $tag->update([
                'slug' => generate_english_slug($tag->name),
            ]);
        });

        Config::create([
            'id'         => 167,
            'name'       => 'bjyblog.seo.use_slug',
            'value'      => 'false',
            'created_at' => '2019-05-19 19:43:00',
            'updated_at' => '2019-05-19 19:43:00',
            'deleted_at' => null,
        ]);
    }
}
