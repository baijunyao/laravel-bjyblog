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

class CategoryControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestUpdate, TestDestroy, TestRestore, TestForceDelete;
    protected $urlPrefix = 'admin/category/';
    protected $table = 'categories';
    protected $destroyId = 2;
    protected $restoreId = 3;
    protected $forceDeleteId = 3;
    protected $storeData = [
        'name' => '新增',
        'keywords' => '新增',
        'description' => '新增',
        'sort' => 3,
    ];
    protected $updateData = [
        'name' => '编辑',
        'keywords' => '编辑',
        'description' => '编辑',
        'sort' => 10,
    ];

    public function testDestroyHasArticle()
    {
        $this->adminGet('destroy/1')->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '请先删除此分类下的文章',
                    'alert-type' => 'error'
                ]
            ]
        ]);
    }
}
