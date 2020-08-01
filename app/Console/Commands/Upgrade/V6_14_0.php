<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Schema;

class V6_14_0 extends Command
{
    protected $signature   = 'upgrade:v6.14.0';
    protected $description = 'Upgrade to v6.14.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        if (!Schema::hasColumn('articles', 'views')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->integer('views')->after('is_top');
            });
        }

        $articles = DB::table('articles')->get();

        $views = DB::table('visits')
            ->where('primary_key', 'visits:articles_visits')
            ->pluck('score', 'secondary_key');

        foreach ($articles as $article) {
            DB::table('articles')->where('id', $article->id)->update([
                'views' => $views[$article->id] ?? 0,
            ]);
        }

        Schema::drop('visits');

        return 0;
    }
}
