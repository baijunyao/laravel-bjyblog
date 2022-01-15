<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

use App\Notifications\SiteApply;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

class SiteControllerTest extends TestCase
{
    protected $urlPrefix = 'sites/';
    protected $table     = 'sites';
    protected $storeData = [
        'name'        => '新增',
        'url'         => 'store.com',
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
        $this->setupEmail();

        $this->UserPost('', $this->storeData)
            ->assertStatus(200);
        $this->assertDatabaseHas($this->table, [
            'name'        => '新增',
            'url'         => 'http://store.com',
            'description' => '用于测试',
        ]);

        Notification::assertSentTo(new AnonymousNotifiable(), SiteApply::class);
    }
}
