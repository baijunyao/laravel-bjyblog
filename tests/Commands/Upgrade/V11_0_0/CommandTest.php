<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V11_0_0;

use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $updatedConfigs = [
            160 => 'filesystems.disks.oss_backups.access_key',
            161 => 'filesystems.disks.oss_backups.secret_key',
            162 => 'filesystems.disks.oss_backups.bucket',
            163 => 'filesystems.disks.oss_backups.endpoint',
        ];

        foreach ($updatedConfigs as $id => $name) {
            static::assertNotSame($name, DB::table('configs')->where('id', $id)->value('name'));
        }

        static::assertEquals(0, DB::table('configs')->where('id', '>=', 200)->count());

        $this->artisan('upgrade:v11.0.0')->assertExitCode(0);

        static::assertEquals(5, DB::table('configs')->where('id', '>=', 200)->count());

        $savedConfigs = [
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
        ];

        foreach ($savedConfigs as $savedConfig) {
            static::assertDatabaseHas('configs', $savedConfig);
        }
    }
}
