<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Article;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Schema;

class V6_11_0 extends Command
{
    protected $signature   = 'upgrade:v6.11.0';
    protected $description = 'Upgrade to v6.11.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        if (!Schema::hasTable('visits')) {
            Schema::create('visits', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('primary_key');
                $table->string('secondary_key');
                $table->unsignedBigInteger('score');
            });
        }

        $articles = Article::withTrashed()->get();

        foreach ($articles as $article) {
            /** @var \App\Models\Article $article */
            DB::table('visits')->insertOrIgnore([
                'primary_key'   => 'visits:articles_visits',
                'secondary_key' => $article->id,
                'score'         => $article->getAttribute('click'),
            ]);
        }

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('click');
        });

        return 0;
    }
}
