<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_5_4_3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.4.3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.5.4.3';

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
        // 获取配置项
        $configModel = new Config();
        $config = $configModel->where('name', 'like', 'email.%')->get();
        // 把 email 改为 mail
        foreach ($config as $k => $v) {
            $updateMap = [
                'id' => $v->id
            ];
            $updateData = [
                'name' => str_replace('email.', 'mail.', $v->name)
            ];
            $configModel->updateData($updateMap, $updateData);
        }
        // 增加 mail.from.address 配置
        $storeData = [
            'id' => 157,
            'name' => 'mail.from.address',
            'value' => $config->where('id', 143)->first()->value
        ];
        $configModel->storeData($storeData);
        $this->info('success');
    }
}
