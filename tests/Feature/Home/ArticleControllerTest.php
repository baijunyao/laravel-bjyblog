<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class ArticleControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')->assertStatus(200);
    }

    public function testShow()
    {
        $this->get('/article/1')->assertStatus(200);
    }

    public function testShowNotFound()
    {
        $this->get('/article/100')->assertNotFound();
    }

    public function testSearch()
    {
        $this->get('/search?wd=laravel')->assertOk();
    }

    public function testSearchForRobot()
    {
        $this->get('/search?wd=laravel', [
            'user-agent' => 'Mozilla/5.0 (Linux;u;Android 4.2.2;zh-cn;) AppleWebKit/534.46 (KHTML,like Gecko) Version/5.1 Mobile Safari/10600.6.3 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
        ])->assertNotFound();
    }
}
