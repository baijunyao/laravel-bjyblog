<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use App\Models\Console;
use App\Models\Nav;
use Artisan;
use Illuminate\Console\Command;

class V5_5_5_0 extends Command
{
    protected $signature   = 'upgrade:v5.5.5.0';
    protected $description = 'Upgrade to v5.5.5.0';

    public function handle(): int
    {
        $names = [
            'App\Console\Commands\Upgrade\V5_5_4_1',
            'App\Console\Commands\Upgrade\V5_5_4_3',
        ];

        if (Console::whereIn('name', $names)->count() !== 0) {
            return 0;
        }

        if (Nav::select('id')->count() === 0) {
            Artisan::call('db:seed', [
                '--class' => 'NavsTableSeeder',
            ]);
        }

        if (Config::where('id', '>', 100)->count() === 0) {
            $old_configs = Config::where('id', '<', 100)->pluck('value', 'name');
            $new_configs = [
                [
                    'id'    => 101,
                    'name'  => 'bjyblog.web_name',
                    'value' => $old_configs['WEB_NAME'],
                ],
                [
                    'id'    => 102,
                    'name'  => 'bjyblog.head.keywords',
                    'value' => $old_configs['WEB_KEYWORDS'],
                ],
                [
                    'id'    => 103,
                    'name'  => 'bjyblog.head.description',
                    'value' => $old_configs['WEB_DESCRIPTION'],
                ],
                [
                    'id'    => 107,
                    'name'  => 'bjyblog.water.text',
                    'value' => $old_configs['TEXT_WATER_WORD'],
                ],
                [
                    'id'    => 109,
                    'name'  => 'bjyblog.water.size',
                    'value' => $old_configs['TEXT_WATER_FONT_SIZE'],
                ],
                [
                    'id'    => 110,
                    'name'  => 'bjyblog.water.color',
                    'value' => $old_configs['TEXT_WATER_COLOR'],
                ],
                [
                    'id'    => 117,
                    'name'  => 'bjyblog.icp',
                    'value' => $old_configs['WEB_ICP_NUMBER'],
                ],
                [
                    'id'    => 118,
                    'name'  => 'bjyblog.admin_email',
                    'value' => $old_configs['ADMIN_EMAIL'],
                ],
                [
                    'id'    => 119,
                    'name'  => 'bjyblog.copyright_word',
                    'value' => $old_configs['COPYRIGHT_WORD'],
                ],
                [
                    'id'    => 120,
                    'name'  => 'services.qq.client_id',
                    'value' => $old_configs['QQ_APP_ID'],
                ],
                [
                    'id'    => 123,
                    'name'  => 'bjyblog.statistics',
                    'value' => $old_configs['WEB_STATISTICS'],
                ],
                [
                    'id'    => 125,
                    'name'  => 'bjyblog.author',
                    'value' => $old_configs['AUTHOR'],
                ],
                [
                    'id'    => 126,
                    'name'  => 'services.qq.client_secret',
                    'value' => $old_configs['QQ_APP_KEY'],
                ],
                [
                    'id'    => 128,
                    'name'  => 'bjyblog.baidu_site_url',
                    'value' => $old_configs['BAIDU_SITE_URL'],
                ],
                [
                    'id'    => 133,
                    'name'  => 'services.weibo.client_id',
                    'value' => $old_configs['SINA_API_KEY'],
                ],
                [
                    'id'    => 134,
                    'name'  => 'services.weibo.client_secret',
                    'value' => $old_configs['SINA_SECRET'],
                ],
                [
                    'id'    => 139,
                    'name'  => 'services.github.client_id',
                    'value' => $old_configs['GITHUB_CLIENT_ID'],
                ],
                [
                    'id'    => 140,
                    'name'  => 'services.github.client_secret',
                    'value' => $old_configs['GITHUB_CLIENT_SECRET'],
                ],
                [
                    'id'    => 141,
                    'name'  => 'bjyblog.alt_word',
                    'value' => $old_configs['IMAGE_TITLE_ALT_WORD'],
                ],
                [
                    'id'    => 142,
                    'name'  => 'email.host',
                    'value' => $old_configs['EMAIL_SMTP'],
                ],
                [
                    'id'    => 143,
                    'name'  => 'email.username',
                    'value' => $old_configs['EMAIL_USERNAME'],
                ],
                [
                    'id'    => 144,
                    'name'  => 'email.password',
                    'value' => $old_configs['EMAIL_PASSWORD'],
                ],
                [
                    'id'    => 145,
                    'name'  => 'email.from.name',
                    'value' => $old_configs['EMAIL_FROM_NAME'],
                ],
                [
                    'id'    => 148,
                    'name'  => 'bjyblog.notification_email',
                    'value' => $old_configs['EMAIL_RECEIVE'],
                ],
                [
                    'id'    => 149,
                    'name'  => 'bjyblog.head.title',
                    'value' => $old_configs['WEB_TITLE'],
                ],
                [
                    'id'    => 150,
                    'name'  => 'bjyblog.qq_qun.article_id',
                    'value' => $old_configs['QQ_QUN_ARTICLE_ID'],
                ],

                [
                    'id'    => 151,
                    'name'  => 'bjyblog.qq_qun.number',
                    'value' => $old_configs['QQ_QUN_NUMBER'],
                ],
                [
                    'id'    => 152,
                    'name'  => 'bjyblog.qq_qun.code',
                    'value' => $old_configs['QQ_QUN_CODE'],
                ],
                [
                    'id'    => 153,
                    'name'  => 'bjyblog.qq_qun.or_code',
                    'value' => $old_configs['QQ_QUN_OR_CODE'],
                ],

                [
                    'id'    => 154,
                    'name'  => 'email.driver',
                    'value' => 'smtp',
                ],
                [
                    'id'    => 155,
                    'name'  => 'email.port',
                    'value' => 465,
                ],
            ];

            foreach ($new_configs as $newConfig) {
                Config::firstOrCreate($newConfig);
            }
        }

        if (Config::where('id', 156)->count() === 0) {
            Config::firstOrCreate([
                'id'    => 156,
                'name'  => 'email.encryption',
                'value' => 'ssl',
            ]);
        }

        $mail_configs = Config::where('name', 'like', 'email.%')->get();

        foreach ($mail_configs as $mail_config) {
            Config::where('id', $mail_config->id)->update([
                'name' => str_replace('email.', 'mail.', $mail_config->name),
            ]);
        }

        if (Config::where('id', 157)->count() === 0) {
            Config::firstOrCreate([
                'id'    => 157,
                'name'  => 'mail.from.address',
                'value' => Config::where('id', 143)->value('value'),
            ]);
        }

        return 0;
    }
}
