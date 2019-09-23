<?php

namespace Tests\Commands\Upgrade\V5_5_11_0;

use App\Models\Config;
use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->assertDatabaseHas('configs', [
            'name' => 'bjyblog.web_name',
        ]);

        $this->assertDatabaseMissing('configs', [
            'name' => 'app.name',
        ]);

        Artisan::call('upgrade:v5.5.11.0');

        $this->assertDatabaseMissing('configs', [
            'name' => 'bjyblog.web_name',
        ]);

        $this->assertDatabaseHas('configs', [
            'name' => 'app.name',
        ]);

        $this->assertDatabaseHas('configs', [
            'name'  => 'app.locale',
            'value' => 'zh-CN',
        ]);

        static::assertEquals(0, Config::onlyTrashed()->where('id', '<', 101)->count());
    }
}
