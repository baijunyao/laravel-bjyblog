<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Console;
use Illuminate\Console\Command;

class V5_5_10_0 extends Command
{
    protected $signature = 'upgrade:v5.5.10.0';

    protected $description = 'Upgrade to v5.5.10.0';

    public function handle(): int
    {
        $id = Console::whereIn('id', [5, 6])->pluck('id');

        if (!$id->contains(5)) {
            Console::insert([
                'id'         => 5,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_8_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => null,
            ]);
        }

        if (!$id->contains(6)) {
            Console::insert([
                'id'         => 6,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_9_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => null,
            ]);
        }
        $this->info('Upgrade to v5.5.10.0 version completed');

        return 0;
    }
}
