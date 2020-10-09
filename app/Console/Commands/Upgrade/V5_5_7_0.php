<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_5_7_0 extends Command
{
    protected $signature = 'upgrade:v5.5.7.0';

    protected $description = 'Upgrade to v5.5.7.0';

    public function handle(): int
    {
        Config::create([
            'id'    => '158',
            'name'  => 'sentry.dsn',
            'value' => '',
        ]);
        $this->info('finish');

        return 0;
    }
}
