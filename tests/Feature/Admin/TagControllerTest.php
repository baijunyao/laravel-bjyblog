<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\CURD\TestCreate;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Tests\Feature\Admin\CURD\TestStore;
use Tests\Feature\Admin\CURD\TestUpdate;

class TagControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/tag/';
    protected $table = 'tags';
    protected $destroyId = 2;
    protected $restoreId = 3;
    protected $forceDeleteId = 3;
    protected $storeData = [
        'name' => '测试'
    ];
    protected $updateData = [
        'name' => '编辑'
    ];
}
