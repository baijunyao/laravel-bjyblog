<?php

namespace Tests\Feature\Admin;

use App\Models\Tag;
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

class TagControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix     = 'admin/tag/';
    protected $table         = 'tags';
    protected $destroyId     = 2;
    protected $restoreId     = 3;
    protected $forceDeleteId = 3;
    protected $storeData     = [
        'name' => '新增',
    ];
    protected $updateData = [
        'name' => '编辑',
    ];

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
        $tag = Tag::find(1);

        config([
            'bjyblog.seo.use_slug' => 'true',
        ]);
        static::assertEquals($tag->url, url('tag', [$tag->id, $tag->slug]));

        config([
            'bjyblog.seo.use_slug' => 'false',
        ]);
        static::assertEquals($tag->url, url('tag', [$tag->id]));
    }
}
