<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Category;
use App\Models\Config;
use App\Models\Tag;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_4_0 extends Command
{
    protected $signature = 'upgrade:v5.8.4.0';

    protected $description = 'upgrade to v5.8.4.0';

    public function handle(): int
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

        DB::table('articles')->get()->map(function ($article) {
            DB::table('articles')->where('id', $article->id)->update([
                'slug' => generate_english_slug($article->title),
            ]);
        });

        Category::withTrashed()->get()->map(function ($category) {
            assert($category instanceof Category);

            $category->update([
                'slug' => generate_english_slug($category->name),
            ]);
        });

        Tag::withTrashed()->get()->map(function ($tag) {
            assert($tag instanceof Tag);

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

        return 0;
    }
}
