<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Nav;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class V5_8_7_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.7.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.7.0';

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
        Schema::dropIfExists('notes');
        Schema::rename('chats', 'notes');

        $nav = Nav::where('url', 'chat')->first();

        if ($nav !== null) {
            $nav->update([
                'url' => 'note',
            ]);
        }
    }
}
