<?php

declare(strict_types=1);

namespace App\Console\Commands\TencentCloud;

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
        $tencent_cloud_config = config('services.tencent_cloud');

        [
            'secret_id'   => $secret_id,
            'secret_key'  => $secret_key,
            'region'      => $region,
            'ssh_key_id'  => $ssh_key_id,
            'instance_id' => $instance_id,
            'image_id'    => $image_id,
            'host_name'   => $host_name
        ] = $tencent_cloud_config;

        $this->table(
            ['Name', 'Value'],
            collect($tencent_cloud_config)->map(fn ($value, $key) => ['name' => $key, 'value' => $value]),
        );

        $client                 = new CvmClient(new Credential($secret_id, $secret_key), $region);
        $login_settings         = new LoginSettings();
        $login_settings->KeyIds = [$ssh_key_id];
        $reset_instance_request = new ResetInstanceRequest();

        $reset_instance_request->InstanceId    = $instance_id;
        $reset_instance_request->ImageId       = $image_id;
        $reset_instance_request->HostName      = $host_name;
        $reset_instance_request->LoginSettings = $login_settings;

        if ($this->confirm('Do you wish to continue?')) {
            $response = $client->ResetInstance($reset_instance_request);
            $this->info($response->toJsonString());
        }

        return 0;
    }
}
