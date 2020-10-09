<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_8_1_0 extends Command
{
    protected $signature = 'upgrade:v5.8.1.0';

    protected $description = 'upgrade to v5.8.1.0';

    public function handle(): int
    {
        $disks = Config::where('id', 164)->first();

        if ($disks !== null && $disks->value === '') {
            $disks->update([
                'value' => [],
            ]);
        }

        return 0;
    }
}
