<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_8_5_0 extends Command
{
    protected $signature = 'upgrade:v5.8.5.0';

    protected $description = 'upgrade to v5.8.5.0';

    public function handle(): int
    {
        Config::insert([
            [
                'id'         => 168,
                'name'       => 'bjyblog.social_share.select_plugin',
                'value'      => 'sharejs',
                'created_at' => '2019-05-27 22:22:00',
                'updated_at' => '2019-05-27 22:22:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 169,
                'name'       => 'bjyblog.social_share.jssocials_config',
                'value'      => '{
    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "pocket", "whatsapp", "messenger", "vkontakte", "telegram", "line"],
    showLabel: false,
    showCount: false,
    shareIn: "popup"
}',
                'created_at' => '2019-05-27 22:22:00',
                'updated_at' => '2019-05-27 22:22:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 170,
                'name'       => 'bjyblog.social_share.sharejs_config',
                'value'      => '{
    sites: ["weibo", "qq", "wechat", "douban", "qzone", "linkedin", "facebook", "twitter", "google"]
}',
                'created_at' => '2019-05-27 22:22:00',
                'updated_at' => '2019-05-27 22:22:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 171,
                'name'       => 'bjyblog.logo_with_php_tag',
                'value'      => 'true',
                'created_at' => '2019-05-28 23:15:00',
                'updated_at' => '2019-05-28 23:15:00',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
