<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Artisan;
use Illuminate\Console\Command;

class V5_5_9_0 extends Command
{
    protected $signature = 'upgrade:v5.5.9.0';

    protected $description = 'Upgrade to v5.5.9.0';

    public function handle(): int
    {
        if (Config::where('id', '>', 159)->count() === 0) {
            $configs = [
                [
                    'id'    => 159,
                    'name'  => 'database.connections.mysql.dump.dump_binary_path',
                    'value' => '/bin/',
                ],
                [
                    'id'    => 160,
                    'name'  => 'filesystems.disks.oss.access_id',
                    'value' => '',
                ],
                [
                    'id'    => 161,
                    'name'  => 'filesystems.disks.oss.access_key',
                    'value' => '',
                ],
                [
                    'id'    => 162,
                    'name'  => 'filesystems.disks.oss.bucket',
                    'value' => '',
                ],
                [
                    'id'    => 163,
                    'name'  => 'filesystems.disks.oss.endpoint',
                    'value' => '',
                ],
                [
                    'id'    => 164,
                    'name'  => 'backup.backup.destination.disks',
                    'value' => '[]',
                ],
                [
                    'id'    => 165,
                    'name'  => 'backup.notifications.mail.to',
                    'value' => '',
                ],
            ];

            Config::insert($configs);
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
        }

        $this->info('Upgrade to v5.5.9.0 version completed');

        return 0;
    }
}
