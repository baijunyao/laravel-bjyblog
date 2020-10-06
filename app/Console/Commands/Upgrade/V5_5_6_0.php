<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;

class V5_5_6_0 extends Command
{
    protected $signature   = 'upgrade:v5.5.6.0';
    protected $description = 'Upgrade to v5.5.6.0';

    public function handle(): int
    {
        $envContent = file_get_contents(base_path('.env'));

        if ($envContent !== false) {
            $env = str_replace('BLOG_BRANCH', 'DEPLOY_BRANCH', $envContent);
            file_put_contents(base_path('.env'), $env);
        }

        return 0;
    }
}
