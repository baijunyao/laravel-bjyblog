<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Console;
use Illuminate\Console\Command;

class V5_8_9_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.9.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $names = [
            'App\Console\Commands\Upgrade\V5_5_4_3',
            'App\Console\Commands\Upgrade\V5_5_5_0',
        ];
        Console::whereIn('name', $names)->forceDelete();

        Console::where('name', 'App\Console\Commands\Upgrade\V5_5_4_1')->update([
            'name' => 'App\Console\Commands\Upgrade\V5_5_5_0',
        ]);
    }
}
