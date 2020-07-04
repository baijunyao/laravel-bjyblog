<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V7_0_0;

use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $configNameById = [
            142 => 'mail.host',
            143 => 'mail.username',
            144 => 'mail.password',
            154 => 'mail.driver',
            155 => 'mail.port',
            156 => 'mail.encryption',
        ];

        foreach ($configNameById as $id => $name) {
            static::assertSame($name, DB::table('configs')->where('id', $id)->value('name'));
        }

        $this->artisan('upgrade:v7.0.0');

        $configNameById = [
            142 => 'mail.mailers.smtp.host',
            143 => 'mail.mailers.smtp.username',
            144 => 'mail.mailers.smtp.password',
            154 => 'mail.default',
            155 => 'mail.mailers.smtp.port',
            156 => 'mail.mailers.smtp.encryption',
        ];

        foreach ($configNameById as $id => $name) {
            static::assertSame($name, DB::table('configs')->where('id', $id)->value('name'));
        }
    }
}
