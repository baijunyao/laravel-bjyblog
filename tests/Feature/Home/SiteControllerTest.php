<?php

namespace Tests\Feature\Home;

use Illuminate\Support\Facades\Notification;
use Tests\Feature\Admin\CURD\TestStore;

class SiteControllerTest extends TestCase
{
    use TestStore;

    protected $urlPrefix = 'site/';
    protected $table     = 'sites';
    protected $storeData = [
        'name'        => '新增',
        'url'         => 'https://store.com',
        'description' => '用于测试',
        'email'       => 'test@test.com',
    ];

    public function testIndex()
    {
        $this->UserGet('/')
            ->assertStatus(200);
    }

    public function testStore()
    {
        Notification::fake();
        $this->UserPost('store', $this->storeData)
            ->assertStatus(200);
        $this->assertDatabaseHas($this->table, [
            'name'        => '新增',
            'url'         => 'https://store.com',
            'description' => '用于测试',
        ]);
    }
}
