<?php

namespace App\Console\Commands\Bjyblog;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install';

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
         * 获取并替换 .env 中的数据库账号密码
         */
        $username = $this->ask('请输入数据库账号', 'root');
        $password = $this->ask('请输入数据库密码', false);
        $database = $this->ask('请输入数据库名', 'test');
        // ask 不允许为空  此处是为了兼容一些数据库密码为空的情况
        $password = $password ? $password : '';
        $envExample = file_get_contents(base_path('.env.example'));
        $search = [
            'DB_DATABASE=homestead',
            'DB_USERNAME=homestead',
            'DB_PASSWORD=secret'
        ];
        $replace = [
            'DB_DATABASE='.$database,
            'DB_USERNAME='.$username,
            'DB_PASSWORD='.$password
        ];
        $env = str_replace($search, $replace, $envExample);
        file_put_contents(base_path('.env'), $env);
    }
}
