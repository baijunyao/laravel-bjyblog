<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Console;
use Illuminate\Console\Command;

class V5_8_9_0 extends Command
{
    protected $signature = 'upgrade:v5.8.9.0';

    protected $description = 'Upgrade to v5.8.9.0';

    public function handle(): int
    {
        $names = [
            'App\Console\Commands\Upgrade\V5_5_4_3',
            'App\Console\Commands\Upgrade\V5_5_5_0',
        ];
        Console::whereIn('name', $names)->forceDelete();

        Console::where('name', 'App\Console\Commands\Upgrade\V5_5_4_1')->update([
            'name' => 'App\Console\Commands\Upgrade\V5_5_5_0',
        ]);

        return 0;
    }
}
