<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestCreate;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Tests\Feature\Admin\CURD\TestStore;
use Tests\Feature\Admin\CURD\TestUpdate;

class FriendControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestUpdate, TestDestroy, TestRestore, TestForceDelete;
    protected $urlPrefix = 'admin/friend/';
    protected $table     = 'friends';
    protected $storeData = [
        'name' => '新增',
        'url'  => 'https://store.com',
        'sort' => 3,
    ];
    protected $updateData = [
        'name' => '编辑',
        'url'  => 'https://update.com',
        'sort' => 3,
    ];
}
