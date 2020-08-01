<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V6_6_0 extends Command
{
    protected $signature   = 'upgrade:v6.6.0';
    protected $description = 'Upgrade to v6.6.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $session_domain_confing = [
            'id'         => 185,
            'name'       => 'session.domain',
            'value'      => '',
            'created_at' => '2019-12-14 10:49:00',
            'updated_at' => '2019-12-14 10:49:00',
            'deleted_at' => null,
        ];
        $session_domain_value = env('SESSION_DOMAIN');

        if ($session_domain_value) {
            $session_domain_confing['value'] = $session_domain_value;
        }

        Config::create($session_domain_confing);

        return 0;
    }
}
