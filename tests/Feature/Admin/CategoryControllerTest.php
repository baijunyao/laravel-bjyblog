<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use Mockery;
use Stichoza\GoogleTranslate\GoogleTranslate;
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
    protected $urlPrefix     = 'admin/category/';
    protected $table         = 'categories';
    protected $destroyId     = 2;
    protected $restoreId     = 3;
    protected $forceDeleteId = 3;
    protected $storeData     = [
        'name'        => '新增',
        'keywords'    => '新增',
        'description' => '新增',
        'sort'        => 3,
    ];
    protected $updateData = [
        'name'        => '编辑',
        'keywords'    => '编辑',
        'description' => '编辑',
        'sort'        => 10,
    ];

    public function testDestroyHasArticle()
    {
        $this->adminGet('destroy/1')->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '请先删除此分类下的文章',
                    'alert-type'    => 'error',
                ],
            ],
        ]);
    }

    public function testCreateForEnLocale()
    {
        config([
            'app.locale' => 'en',
        ]);

        $this->adminPost('store', [
            'name' => 'Add',
            'slug' => '',
        ] + $this->storeData)->assertSessionHasAll(static::STORE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, [
            'name' => 'Add',
            'slug' => 'add',
        ] + $this->storeData);
    }

    public function testCreateForCnLocale()
    {
        config([
            'app.locale' => 'zh-CN',
        ]);

        $googleTranslate = Mockery::mock('overload:' . GoogleTranslate::class);
        $googleTranslate->shouldReceive('setUrl->setSource->translate')->andReturn('New');

        $this->adminPost('store', [
            'slug' => '',
        ] + $this->storeData)->assertSessionHasAll(static::STORE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, [
            'slug' => 'new',
        ] + $this->storeData);
    }

    public function testUseSlug()
    {
        $category = Category::find(1);

        config([
            'bjyblog.seo.use_slug' => 'true',
        ]);
        static::assertEquals($category->url, url('category', [$category->id, $category->slug]));

        config([
            'bjyblog.seo.use_slug' => 'false',
        ]);
        static::assertEquals($category->url, url('category', [$category->id]));
    }
}
