<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_6_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.6.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.6.0';

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
        Schema::dropIfExists('socialite_users');
        Schema::dropIfExists('socialite_clients');

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
        Schema::rename('oauth_clients', 'socialite_clients');
    }
}
