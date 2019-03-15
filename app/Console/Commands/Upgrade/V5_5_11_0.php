<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_5_11_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.11.0';

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
        $webName = Config::where('name', 'bjyblog.web_name')->first();

        if (!empty($webName)) {
            $webName->update([
                'name' => 'app.name',
            ]);
        }

        $appLocale = Config::where('name', 'app.locale')->first();

        if (empty($appLocale)) {
            Config::create([
                'name'  => 'app.locale',
                'value' => 'zh-CN',
            ]);
        }

        Config::onlyTrashed()->where('id', '<', 101)->forceDelete();

        $this->info('Upgrade to v5.5.11.0 version completed');
    }
}
