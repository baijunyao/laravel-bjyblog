<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configs')->delete();
        
        \DB::table('configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'WEB_NAME',
                'value' => '白俊遥博客',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'WEB_KEYWORDS',
                'value' => '个人博客,博客模板,thinkphp,laravel博客,php博客,技术博客,白俊遥',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-06-21 22:51:54',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'WEB_DESCRIPTION',
                'value' => '白俊遥的php博客,个人技术博客,bjyblog,bjyadmin官方网站',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'WEB_STATUS',
                'value' => '1',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'WATER_TYPE',
                'value' => '1',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'TEXT_WATER_WORD',
                'value' => 'baijunyao.com',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'TEXT_WATER_TTF_PTH',
                'value' => './Public/static/font/ariali.ttf',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'TEXT_WATER_FONT_SIZE',
                'value' => '15',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'TEXT_WATER_COLOR',
                'value' => '#008CBA',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'TEXT_WATER_ANGLE',
                'value' => '0',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'TEXT_WATER_LOCATE',
                'value' => '9',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'IMAGE_WATER_PIC_PTAH',
                'value' => './Upload/image/logo/logo.png',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'IMAGE_WATER_LOCATE',
                'value' => '9',
                'created_at' => '2017-04-25 12:12:00',
                'updated_at' => '2017-04-25 12:12:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'IMAGE_WATER_ALPHA',
                'value' => '80',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'WEB_CLOSE_WORD',
                'value' => '网站升级中，请稍后访问。',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'WEB_ICP_NUMBER',
                'value' => '豫ICP备14009546号-3',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'ADMIN_EMAIL',
                'value' => 'baijunyao@baijunyao.com',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-06-21 22:51:54',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'COPYRIGHT_WORD',
                'value' => '本文为白俊遥原创文章,转载无需和我联系,但请注明来自<a href="http://baijunyao.com">白俊遥博客</a>http://baijunyao.com',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-06-21 22:51:54',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'QQ_APP_ID',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'CHANGYAN_APP_ID',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'CHANGYAN_CONF',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'WEB_STATISTICS',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-06-21 22:51:54',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'CHANGEYAN_RETURN_COMMENT',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'AUTHOR',
                'value' => '白俊遥',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'QQ_APP_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'CHANGYAN_COMMENT',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'BAIDU_SITE_URL',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-06-21 22:51:54',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'DOUBAN_API_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'DOUBAN_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'RENREN_API_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'RENREN_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'SINA_API_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'SINA_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'KAIXIN_API_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'KAIXIN_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'SOHU_API_KEY',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'SOHU_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'GITHUB_CLIENT_ID',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'GITHUB_CLIENT_SECRET',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'IMAGE_TITLE_ALT_WORD',
                'value' => '白俊遥博客',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'EMAIL_SMTP',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'EMAIL_USERNAME',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'EMAIL_PASSWORD',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'EMAIL_FROM_NAME',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'COMMENT_REVIEW',
                'value' => '0',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'COMMENT_SEND_EMAIL',
                'value' => '1',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'EMAIL_RECEIVE',
                'value' => '',
                'created_at' => '2017-04-25 12:12:01',
                'updated_at' => '2017-04-25 12:12:01',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'WEB_TITLE',
                'value' => '白俊遥博客,技术博客,个人博客模板, php博客系统',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            49 =>
                array (
                    'id' => 50,
                    'name' => 'QQ_QUN_ARTICLE_ID',
                    'value' => '1',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            50 =>
                array (
                    'id' => 51,
                    'name' => 'QQ_QUN_NUMBER',
                    'value' => '88199093',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            51 =>
                array (
                    'id' => 52,
                    'name' => 'QQ_QUN_CODE',
                    'value' => '<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="白俊遥博客群" title="白俊遥博客群"></a>',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            52 =>
                array (
                    'id' => 53,
                    'name' => 'QQ_QUN_OR_CODE',
                    'value' => '/uploads/images/default.png',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
        ));
        
        
    }
}