<?php

namespace Tests\Feature\Admin;

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
        'oauth_user_id' => 1,
        'name'          => '测试',
        'description'   => '用于测试',
        'url'           => 'https://test.com',
        'audit'         => 1,
        'sort'          => 1,
    ];

    public function testUpdate()
    {
        $site = [
            'oauth_user_id' => 2,
            'name'          => '编辑',
            'description'   => '编辑',
            'url'           => 'https://update.com',
            'audit'         => 1,
            'sort'          => 2,
        ];

        $this->adminPost('update/' . $this->updateId, $site)
            ->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $this->updateData);
    }
}
