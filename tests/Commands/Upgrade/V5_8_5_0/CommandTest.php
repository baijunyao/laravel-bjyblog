<?php

namespace Tests\Commands\Upgrade\V5_8_5_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $configs = [
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
        ];

        foreach ($configs as $config) {
            $this->assertDatabaseMissing('configs', $config);
        }

        Artisan::call('upgrade:v5.8.5.0');

        foreach ($configs as $config) {
            $this->assertDatabaseHas('configs', $config);
        }
    }
}
