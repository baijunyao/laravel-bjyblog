<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;

class V6_1_0 extends Command
{
    protected $signature   = 'upgrade:v6.1.0';
    protected $description = 'Upgrade to v6.1.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->call('bjyblog:generate-sitemap');

        return 0;
    }
}
