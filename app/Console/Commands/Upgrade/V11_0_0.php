<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Artisan;
use DB;
use File;
use Illuminate\Console\Command;

class V11_0_0 extends Command
{
    protected $signature   = 'upgrade:v11.0.0';
    protected $description = 'Upgrade to v11.0.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        if (File::isDirectory(public_path('uploads')) && !is_link(public_path('uploads'))) {
            File::moveDirectory(storage_path('app/public/uploads'), storage_path('app/public/uploads.bak'));
            File::moveDirectory(public_path('uploads'), storage_path('app/public/uploads'), true);
            File::copy(storage_path('app/public/uploads.bak/.gitignore'), storage_path('app/public/uploads/.gitignore'));

            if (File::allFiles(storage_path('app/public/uploads.bak')) === []) {
                File::deleteDirectory(storage_path('app/public/uploads.bak'));
            }

            Artisan::call('storage:link --relative');
        }

        $updatedConfigs = [
            160 => 'filesystems.disks.oss_backups.access_key',
            161 => 'filesystems.disks.oss_backups.secret_key',
            162 => 'filesystems.disks.oss_backups.bucket',
            163 => 'filesystems.disks.oss_backups.endpoint',
        ];

        foreach ($updatedConfigs as $id => $name) {
            DB::table('configs')->where('id', $id)->update([
                'name' => $name,
            ]);
        }

        DB::table('configs')->where('id', 164)->update([
            'value' => str_replace('"oss"', '"oss_backups"', DB::table('configs')->where('id', 164)->value('value')),
        ]);

        if (DB::table('configs')->where('id', 153)->value('value') === '/uploads/images/default.png') {
            DB::table('configs')->where('id', 153)->update([
                'value' => '/images/default/qr_code.png',
            ]);
        }

        DB::table('configs')->insertOrIgnore([
            [
                'id'         => 200,
                'name'       => 'filesystems.disks.oss_uploads.access_key',
                'value'      => '',
                'created_at' => '2020-06-26 23:29:52',
                'updated_at' => '2020-06-26 23:29:52',
                'deleted_at' => null,
            ],
            [
                'id'         => 201,
                'name'       => 'filesystems.disks.oss_uploads.secret_key',
                'value'      => '',
                'created_at' => '2020-06-26 23:29:52',
                'updated_at' => '2020-06-26 23:29:52',
                'deleted_at' => null,
            ],
            [
                'id'         => 202,
                'name'       => 'filesystems.disks.oss_uploads.bucket',
                'value'      => '',
                'created_at' => '2020-06-26 23:29:52',
                'updated_at' => '2020-06-26 23:29:52',
                'deleted_at' => null,
            ],
            [
                'id'         => 203,
                'name'       => 'filesystems.disks.oss_uploads.endpoint',
                'value'      => '',
                'created_at' => '2020-06-26 23:29:52',
                'updated_at' => '2020-06-26 23:29:52',
                'deleted_at' => null,
            ],
            [
                'id'         => 204,
                'name'       => 'bjyblog.upload_disks',
                'value'      => '["public"]',
                'created_at' => '2018-12-04 22:29:52',
                'updated_at' => '2018-12-04 22:29:52',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
