<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Schema;

class V6_3_0 extends Command
{
    protected $signature   = 'upgrade:v6.3.0';
    protected $description = 'Upgrade to v6.3.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('status', 'is_audited');
        });

        DB::table('configs')->insert([
            [
                'id'         => 173,
                'name'       => 'bjyblog.comment_audit',
                'value'      => 'false',
                'created_at' => '2019-10-21 22:45:00',
                'updated_at' => '2019-10-21 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 174,
                'name'       => 'services.baidu.appid',
                'value'      => '',
                'created_at' => '2019-10-21 22:45:00',
                'updated_at' => '2019-10-21 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 175,
                'name'       => 'services.baidu.appkey',
                'value'      => '',
                'created_at' => '2019-10-21 22:45:00',
                'updated_at' => '2019-10-21 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 176,
                'name'       => 'services.baidu.secret',
                'value'      => '',
                'created_at' => '2019-10-21 22:45:00',
                'updated_at' => '2019-10-21 22:45:00',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
