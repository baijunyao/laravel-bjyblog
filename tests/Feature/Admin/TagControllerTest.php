<?php

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestCreate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;

class TagControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestEdit, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/tag/';
    protected $destroyId = 2;
    protected $storeData = [
        'name' => 'test'
    ];
    protected $updateData = [
        'name' => '编辑'
    ];
}
