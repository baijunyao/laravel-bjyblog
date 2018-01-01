<?php

namespace Tests\Browser\Home;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IndexTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('阅读全文')
                ->clickLink('写给 thinkphp 开发者的 laravel 系列教程 (一) 序言');
            $window = collect($browser->driver->getWindowHandles())->last();
            $browser->driver->switchTo()->window($window);
            $browser->assertPathIs('/article/1')
                ->click('登录');
        });
    }
}
