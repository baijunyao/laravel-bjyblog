<?php

namespace App\Console\Commands\Seeder;

use App\Models\Config;
use Illuminate\Console\Command;

class UpgradeConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:upgradeConfig';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $config = Config::where('id', '<', 100)->pluck('value', 'name');
        $data   = [
            [
                'id'    => 101,
                'name'  => 'bjyblog.web_name',
                'value' => $config['WEB_NAME'],
            ],
            [
                'id'    => 102,
                'name'  => 'bjyblog.head.keywords',
                'value' => $config['WEB_KEYWORDS'],
            ],
            [
                'id'    => 103,
                'name'  => 'bjyblog.head.description',
                'value' => $config['WEB_DESCRIPTION'],
            ],
            [
                'id'    => 107,
                'name'  => 'bjyblog.water.text',
                'value' => $config['TEXT_WATER_WORD'],
            ],
            [
                'id'    => 109,
                'name'  => 'bjyblog.water.size',
                'value' => $config['TEXT_WATER_FONT_SIZE'],
            ],
            [
                'id'    => 110,
                'name'  => 'bjyblog.water.color',
                'value' => $config['TEXT_WATER_COLOR'],
            ],
            [
                'id'    => 117,
                'name'  => 'bjyblog.icp',
                'value' => $config['WEB_ICP_NUMBER'],
            ],
            [
                'id'    => 118,
                'name'  => 'bjyblog.admin_email',
                'value' => $config['ADMIN_EMAIL'],
            ],
            [
                'id'    => 119,
                'name'  => 'bjyblog.copyright_word',
                'value' => $config['COPYRIGHT_WORD'],
            ],
            [
                'id'    => 120,
                'name'  => 'services.qq.client_id',
                'value' => $config['QQ_APP_ID'],
            ],
            [
                'id'    => 123,
                'name'  => 'bjyblog.statistics',
                'value' => $config['WEB_STATISTICS'],
            ],
            [
                'id'    => 125,
                'name'  => 'bjyblog.author',
                'value' => $config['AUTHOR'],
            ],
            [
                'id'    => 126,
                'name'  => 'services.qq.client_secret',
                'value' => $config['QQ_APP_KEY'],
            ],
            [
                'id'    => 128,
                'name'  => 'bjyblog.baidu_site_url',
                'value' => $config['BAIDU_SITE_URL'],
            ],
            [
                'id'    => 133,
                'name'  => 'services.weibo.client_id',
                'value' => $config['SINA_API_KEY'],
            ],
            [
                'id'    => 134,
                'name'  => 'services.weibo.client_secret',
                'value' => $config['SINA_SECRET'],
            ],
            [
                'id'    => 139,
                'name'  => 'services.github.client_id',
                'value' => $config['GITHUB_CLIENT_ID'],
            ],
            [
                'id'    => 140,
                'name'  => 'services.github.client_secret',
                'value' => $config['GITHUB_CLIENT_SECRET'],
            ],
            [
                'id'    => 141,
                'name'  => 'bjyblog.alt_word',
                'value' => $config['IMAGE_TITLE_ALT_WORD'],
            ],
            [
                'id'    => 142,
                'name'  => 'email.host',
                'value' => $config['EMAIL_SMTP'],
            ],
            [
                'id'    => 143,
                'name'  => 'email.username',
                'value' => $config['EMAIL_USERNAME'],
            ],
            [
                'id'    => 144,
                'name'  => 'email.password',
                'value' => $config['EMAIL_PASSWORD'],
            ],
            [
                'id'    => 145,
                'name'  => 'email.from.name',
                'value' => $config['EMAIL_FROM_NAME'],
            ],
            [
                'id'    => 148,
                'name'  => 'bjyblog.notification_email',
                'value' => $config['EMAIL_RECEIVE'],
            ],
            [
                'id'    => 149,
                'name'  => 'bjyblog.head.title',
                'value' => $config['WEB_TITLE'],
            ],
            [
                'id'    => 150,
                'name'  => 'bjyblog.qq_qun.article_id',
                'value' => $config['QQ_QUN_ARTICLE_ID'],
            ],

            [
                'id'    => 151,
                'name'  => 'bjyblog.qq_qun.number',
                'value' => $config['QQ_QUN_NUMBER'],
            ],
            [
                'id'    => 152,
                'name'  => 'bjyblog.qq_qun.code',
                'value' => $config['QQ_QUN_CODE'],
            ],
            [
                'id'    => 153,
                'name'  => 'bjyblog.qq_qun.or_code',
                'value' => $config['QQ_QUN_OR_CODE'],
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
        $bar = $this->output->createProgressBar(count($data));
        foreach ($data as $k => $v) {
            Config::firstOrCreate($v);
            $bar->advance();
        }
        $bar->finish();
    }
}
