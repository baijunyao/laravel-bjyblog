<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\SocialiteUser;
use App\Notifications\SiteAudit;
use Notification;
use Tests\Feature\Admin\CURD\TestCreate;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Tests\Feature\Admin\CURD\TestStore;

class SiteControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/site/';
    protected $table     = 'sites';
    protected $storeData = [
        'socialite_user_id' => 1,
        'name'              => '测试',
        'description'       => '用于测试',
        'url'               => 'https://test.com',
        'audit'             => 1,
        'sort'              => 1,
    ];

    public function testUpdate()
    {
        Notification::fake();
        $this->setupEmail();

        $site = [
            'socialite_user_id' => 1,
            'name'              => '编辑',
            'description'       => '编辑',
            'url'               => 'https://update.com',
            'audit'             => 1,
            'sort'              => 2,
        ];

        $this->adminPost('update/' . $this->updateId, $site)
            ->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $this->updateData);

        Notification::assertSentTo(SocialiteUser::find(1), SiteAudit::class);
    }
}
