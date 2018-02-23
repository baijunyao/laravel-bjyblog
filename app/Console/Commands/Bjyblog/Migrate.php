<?php

namespace App\Console\Commands\Bjyblog;

use Illuminate\Console\Command;

class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate';

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
        /**
         * 执行迁移填充
         */
        $this->call('key:generate');
        $this->call('migrate');
        $this->call('db:seed');
        $this->info('*************** 安装完成 ***************');
        $this->line('后台链接：/admin/index/index');
        $this->line('邮箱：test@test.com ');
        $this->line('密码：123456 ');
    }
}
