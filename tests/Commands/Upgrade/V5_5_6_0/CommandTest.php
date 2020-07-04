<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_5_6_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v5.5.6.0');

        $envContent = file_get_contents(base_path('.env'));
        static::assertTrue(strpos($envContent, 'BLOG_BRANCH') === false);
        static::assertTrue(strpos($envContent, 'DEPLOY_BRANCH') !== false);
    }
}
