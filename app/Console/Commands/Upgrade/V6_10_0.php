<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V6_10_0 extends Command
{
    protected $signature   = 'upgrade:v6.10.0';
    protected $description = 'Upgrade to v6.10.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        Config::where('id', 160)->update([
            'name' => 'filesystems.disks.oss.access_key',
        ]);

        Config::where('id', 161)->update([
            'name' => 'filesystems.disks.oss.secret_key',
        ]);

        return 0;
    }
}
