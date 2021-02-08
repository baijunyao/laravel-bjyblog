<?php

declare(strict_types=1);

namespace App\Console\Commands\Tencentcloud;

use Illuminate\Console\Command;
use TencentCloud\Common\Credential;
use TencentCloud\Cvm\V20170312\CvmClient;
use TencentCloud\Cvm\V20170312\Models\LoginSettings;
use TencentCloud\Cvm\V20170312\Models\ResetInstanceRequest;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tencentcloud:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Tencent cloud';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client                 = new CvmClient(new Credential(config('services.tencentcloud.secret_id'), config('services.tencentcloud.secret_key')), config('services.tencentcloud.region'));
        $login_settings         = new LoginSettings();
        $login_settings->KeyIds = [config('services.tencentcloud.ssh_key_id')];
        $reset_instance_request = new ResetInstanceRequest();

        $reset_instance_request->InstanceId    = config('services.tencentcloud.instance_id');
        $reset_instance_request->ImageId       = 'img-22trbn9x'; // Ubuntu Server 20.04
        $reset_instance_request->HostName      = 'development';
        $reset_instance_request->LoginSettings = $login_settings;

        $response = $client->ResetInstance($reset_instance_request);

        $this->info($response->toJsonString());

        return 0;
    }
}
