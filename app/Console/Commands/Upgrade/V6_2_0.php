<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V6_2_0 extends Command
{
    protected $signature   = 'upgrade:v6.2.0';
    protected $description = 'Upgrade to v6.2.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $envContent = file_get_contents(base_path('.env'));
        $env        = str_replace('QUEUE_DRIVER', 'QUEUE_CONNECTION', $envContent);
        file_put_contents(base_path('.env'), $env);

        Schema::table('tags', function (Blueprint $table) {
            $table->string('keywords')->default('')->after('slug');
            $table->string('description')->default('')->after('keywords');
        });
    }
}
