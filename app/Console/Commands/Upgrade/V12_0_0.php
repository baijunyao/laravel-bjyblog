<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Schema;

class V12_0_0 extends Command
{
    protected $signature   = 'upgrade:v12.0.0';
    protected $description = 'Upgrade to v12.0.0';

    public function handle(): int
    {
        if (!Schema::hasColumn('socialite_users', 'is_blocked')) {
            Schema::table('socialite_users', function (Blueprint $table) {
                $table->unsignedTinyInteger('is_blocked')
                    ->default(0)
                    ->after('is_admin');
            });
        }

        return 0;
    }
}
