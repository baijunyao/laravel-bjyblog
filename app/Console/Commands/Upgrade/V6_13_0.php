<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class V6_13_0 extends Command
{
    protected $signature   = 'upgrade:v6.13.0';
    protected $description = 'Upgrade to v6.13.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        Schema::dropIfExists('open_sources');
        Schema::rename('git_projects', 'open_sources');
        DB::table('migrations')->where('migration', '2017_10_18_203752_create_git_projects_table')->delete();
        DB::table('navs')->where('url', 'git')->update([
            'url' => 'openSource',
        ]);

        return 0;
    }
}
