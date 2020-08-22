<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;

class V5_5_6_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.6.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
