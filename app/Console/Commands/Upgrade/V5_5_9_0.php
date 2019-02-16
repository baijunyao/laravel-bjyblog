<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Artisan;
use Illuminate\Console\Command;

class V5_5_9_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.9.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $configModel = new Config();
        $count       = $configModel->where('id', '>', 159)->count();
        if ($count === 0) {
            $data = [
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
            $configModel->insert($data);
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
        }
        $this->info('Upgrade to v5.5.9.0 version completed');
    }
}
