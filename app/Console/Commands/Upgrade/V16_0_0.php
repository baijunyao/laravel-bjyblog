<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Friend;
use DB;
use Illuminate\Console\Command;
use Schema;

class V16_0_0 extends Command
{
    protected $signature   = 'upgrade:v16.0.0';
    protected $description = 'Upgrade to v16.0.0';

    public function handle(): int
    {
        if (Schema::hasTable('friendship_links') && Schema::hasTable('friends')) {
            $friends = json_encode(DB::table('friendship_links')->get()->toArray());

            assert(is_string($friends));

            Friend::insertOrIgnore(json_decode($friends, true));

            Schema::rename('friendship_links', 'friendship_links_bak');
        }

        return 0;
    }
}
