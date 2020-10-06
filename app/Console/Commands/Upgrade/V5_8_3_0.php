<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Artisan;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_3_0 extends Command
{
    protected $signature = 'upgrade:v5.8.3.0';

    protected $description = 'upgrade to v5.8.3.0';

    public function handle(): int
    {
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        Schema::table('socialite_clients', function (Blueprint $table) {
            $table->dropColumn('client_id_config');
            $table->dropColumn('client_secret_config');
        });

        DB::table('socialite_clients')->insert([
            [
                'id'            => 4,
                'name'          => 'google',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
            [
                'id'            => 5,
                'name'          => 'facebook',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
        ]);

        return 0;
    }
}
