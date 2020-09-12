<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use File;
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

    public function handle(): int
    {
        $envPath = base_path('.env');

        File::put($envPath, str_replace('QUEUE_DRIVER', 'QUEUE_CONNECTION', File::get($envPath)));

        Schema::table('tags', function (Blueprint $table) {
            $table->string('keywords')->default('')->after('slug');
            $table->string('description')->default('')->after('keywords');
        });

        return 0;
    }
}
