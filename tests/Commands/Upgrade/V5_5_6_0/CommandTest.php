<?php

namespace Tests\Commands\Upgrade\V5_5_6_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.5.6.0');

        $envContent = file_get_contents(base_path('.env'));
        static::assertTrue(strpos($envContent, 'BLOG_BRANCH') === false);
        static::assertTrue(strpos($envContent, 'DEPLOY_BRANCH') !== false);
    }
}
