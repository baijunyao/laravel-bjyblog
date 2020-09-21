<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V13_0_0 extends Command
{
    protected $signature   = 'upgrade:v13.0.0';
    protected $description = 'Upgrade to v13.0.0';

    public function handle(): int
    {
        if (!Schema::hasColumn('oauth_clients', 'provider')) {
            Schema::table('oauth_clients', function (Blueprint $table) {
                $table->string('provider')->after('secret')->nullable();
            });
        }

        return 0;
    }
}
