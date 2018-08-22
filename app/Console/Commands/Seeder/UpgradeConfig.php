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
        $config = Config::pluck('value', 'name');
        $data = [
            [
                'id' => 101,
                'name' => 'bjyblog.web_name',
                'value' => $config['WEB_NAME'],
                'default' => ''
            ],
            [
                'id' => 102,
                'name' => 'bjyblog.head.keywords',
                'value' => $config['WEB_KEYWORDS'],
                'default' => ''
            ],
            [
                'id' => 103,
                'name' => 'bjyblog.head.description',
                'value' => $config['WEB_DESCRIPTION'],
                'default' => ''
            ],
            [
                'id' => 107,
                'name' => 'bjyblog.water.text',
                'value' => $config['TEXT_WATER_WORD'],
                'default' => ''
            ],
            [
                'id' => 109,
                'name' => 'bjyblog.water.size',
                'value' => $config['TEXT_WATER_FONT_SIZE'],
                'default' => '15'
            ],
            [
                'id' => 110,
                'name' => 'bjyblog.water.color',
                'value' => $config['TEXT_WATER_COLOR'],
                'default' => '#0B94C1'
            ],
            [
                'id' => 117,
                'name' => 'bjyblog.icp',
                'value' => $config['WEB_ICP_NUMBER'],
                'default' => ''
            ],
            [
                'id' => 118,
                'name' => 'bjyblog.admin_email',
                'value' => $config['ADMIN_EMAIL'],
                'default' => ''
            ],
            [
                'id' => 119,
                'name' => 'bjyblog.copyright_word',
                'value' => $config['COPYRIGHT_WORD'],
                'default' => ''
            ],
            [
                'id' => 120,
                'name' => 'services.qq.client_id',
                'value' => $config['QQ_APP_ID'],
                'default' => ''
            ],
            [
                'id' => 125,
                'name' => 'bjyblog.author',
                'value' => $config['AUTHOR'],
                'default' => ''
            ],
            [
                'id' => 126,
                'name' => 'services.qq.client_secret',
                'value' => $config['QQ_APP_KEY'],
                'default' => ''
            ],
            [
                'id' => 128,
                'name' => 'bjyblog.baidu_site_url',
                'value' => $config['BAIDU_SITE_URL'],
                'default' => ''
            ],
            [
                'id' => 139,
                'name' => 'services.github.client_id',
                'value' => $config['GITHUB_CLIENT_ID'],
                'default' => ''
            ],
            [
                'id' => 140,
                'name' => 'services.github.client_secret',
                'value' => $config['GITHUB_CLIENT_SECRET'],
                'default' => ''
            ],

            [
                'id' => 141,
                'name' => 'bjyblog.alt_word',
                'value' => $config['IMAGE_TITLE_ALT_WORD'],
                'default' => ''
            ],
            [
                'id' => 142,
                'name' => 'email.host',
                'value' => $config['EMAIL_SMTP'],
                'default' => ''
            ],
            [
                'id' => 143,
                'name' => 'email.username',
                'value' => $config['EMAIL_USERNAME'],
                'default' => ''
            ],
            [
                'id' => 144,
                'name' => 'email.password',
                'value' => $config['EMAIL_PASSWORD'],
                'default' => ''
            ],
            [
                'id' => 145,
                'name' => 'email.from.name',
                'value' => $config['EMAIL_FROM_NAME'],
                'default' => ''
            ],
            [
                'id' => 148,
                'name' => 'bjyblog.notification_email',
                'value' => $config['EMAIL_RECEIVE'],
                'default' => ''
            ],
            [
                'id' => 149,
                'name' => 'bjyblog.head.title',
                'value' => $config['WEB_TITLE'],
                'default' => ''
            ],
            [
                'id' => 150,
                'name' => 'bjyblog.qq_qun.article_id',
                'value' => $config['QQ_QUN_ARTICLE_ID'],
                'default' => ''
            ],

            [
                'id' => 151,
                'name' => 'bjyblog.qq_qun.number',
                'value' => $config['QQ_QUN_NUMBER'],
                'default' => ''
            ],
            [
                'id' => 152,
                'name' => 'bjyblog.qq_qun.code',
                'value' => $config['QQ_QUN_CODE'],
                'default' => ''
            ],
            [
                'id' => 153,
                'name' => 'bjyblog.qq_qun.or_code',
                'value' => $config['QQ_QUN_OR_CODE'],
                'default' => ''
            ],

            [
                'id' => 154,
                'name' => 'email.driver',
                'value' => '',
                'default' => 'smtp'
            ],
            [
                'id' => 155,
                'name' => 'email.port',
                'value' => '',
                'default' => '465'
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
