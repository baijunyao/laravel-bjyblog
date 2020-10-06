<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_6_0 extends Command
{
    protected $signature = 'upgrade:v5.8.6.0';

    protected $description = 'upgrade to v5.8.6.0';

    public function handle(): int
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('oauth_user_id', 'socialite_user_id');
        });
        Schema::table('sites', function (Blueprint $table) {
            $table->renameColumn('oauth_user_id', 'socialite_user_id');
        });
        Schema::table('oauth_users', function (Blueprint $table) {
            $table->renameColumn('oauth_client_id', 'socialite_client_id');
        });

        Schema::rename('oauth_users', 'socialite_users');

        return 0;
    }
}
