<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V7_0_0 extends Command
{
    protected $signature   = 'upgrade:v7.0.0';
    protected $description = 'Upgrade to v7.0.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $configNameById = [
            142 => 'mail.mailers.smtp.host',
            143 => 'mail.mailers.smtp.username',
            144 => 'mail.mailers.smtp.password',
            154 => 'mail.default',
            155 => 'mail.mailers.smtp.port',
            156 => 'mail.mailers.smtp.encryption',
        ];

        foreach ($configNameById as $id => $name) {
            DB::table('configs')->where('id', $id)->update([
                'name' => $name,
            ]);
        }

        return 0;
    }
}
