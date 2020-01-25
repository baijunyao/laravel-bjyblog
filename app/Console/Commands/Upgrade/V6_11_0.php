<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Article;
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

    public function handle()
    {
        $articles = Article::withTrashed()->get();

        foreach ($articles as $article) {
            /** @var \App\Models\Article $article */
            dump($article->id . ':' . $article->click);
            $article->visits()->increment($article->click);
        }

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('click');
        });
    }
}
