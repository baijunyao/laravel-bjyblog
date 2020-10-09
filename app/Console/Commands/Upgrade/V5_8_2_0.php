<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Artisan;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_2_0 extends Command
{
    protected $signature = 'upgrade:v5.8.2.0';

    protected $description = 'upgrade to v5.8.2.0';

    public function handle(): int
    {
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        if (DB::table('socialite_clients')->count() === 0) {
            Schema::drop('socialite_clients');
            Schema::create('socialite_clients', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
                $table->string('client_id')->default('');
                $table->string('client_secret')->default('');
                $table->string('client_id_config')->default('');
                $table->string('client_secret_config')->default('');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        $configs = Config::whereIn('id', [
            120, 126, 133, 134, 139, 140,
        ])->get();

        if ($configs->isNotEmpty()) {
            $value_by_id = $configs->pluck('value', 'id');
            DB::table('socialite_clients')->insert([
                [
                    'id'            => 1,
                    'name'          => 'qq',
                    'client_id'     => $value_by_id[120],
                    'client_secret' => $value_by_id[126],
                    'created_at'    => '2019-05-08 22:13:54',
                    'updated_at'    => '2019-05-08 22:13:54',
                    'deleted_at'    => null,
                ],
                [
                    'id'            => 2,
                    'name'          => 'weibo',
                    'client_id'     => $value_by_id[133],
                    'client_secret' => $value_by_id[134],
                    'created_at'    => '2019-05-08 22:13:54',
                    'updated_at'    => '2019-05-08 22:13:54',
                    'deleted_at'    => null,
                ],
                [
                    'id'            => 3,
                    'name'          => 'github',
                    'client_id'     => $value_by_id[139],
                    'client_secret' => $value_by_id[140],
                    'created_at'    => '2019-05-08 22:13:54',
                    'updated_at'    => '2019-05-08 22:13:54',
                    'deleted_at'    => null,
                ],
            ]);

            $configs->each(function ($config) {
                $config->forceDelete();
            });
        }

        if (!Schema::hasColumn('oauth_users', 'oauth_client_id')) {
            Schema::table('oauth_users', function (Blueprint $table) {
                $table->renameColumn('type', 'oauth_client_id');
            });
        }

        return 0;
    }
}
