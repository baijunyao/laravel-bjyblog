<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\CURD\TestCreate;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;

class ArticleControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/article/';
    protected $table = 'articles';

    public function testUploadImage()
    {
        $file = UploadedFile::fake()->image('article.jpg');
        $response = $this->adminPost('uploadImage', [
            'editormd-image-file' => $file
        ])->assertJson([
            'success' => 1
        ]);
        $content = json_decode($response->getContent(), true);
        $this->assertFileExists(public_path($content['url']));
    }

    public function testStore()
    {
        $file = UploadedFile::fake()->image('cover.jpg');
        $this->adminPost('store', [
            'category_id' => 1,
            'title' => 'title',
            'author' => '白俊遥',
            'keywords' => 'keywords',
            'tag_ids' => [1],
            'description' => '',
            'markdown' => 'content',
            'cover' => $file
        ])->assertSessionHas('laravel-flash', [
            [
                "alert-message" => "添加成功",
                "alert-type" => "success"
            ]
        ]);

        $this->assertDatabaseHas($this->table, [
            'category_id' => 1,
            'title' => 'title',
            'author' => '白俊遥',
            'keywords' => 'keywords',
            'markdown' => 'content',
        ]);
    }

    public function testUpdate()
    {
        $this->adminPost('update/' . $this->updateId, [
            'category_id' => 1,
            'title' => 'update',
            'author' => '白俊遥',
            'tag_ids' => [1],
            'keywords' => 'update',
            'markdown' => 'update',
        ])->assertSessionHas('laravel-flash', [
            [
                "alert-message" => "修改成功",
                "alert-type" => "success"
            ]
        ]);

        $this->assertDatabaseHas('articles', [
            'category_id' => 1,
            'title' => 'update',
            'author' => '白俊遥',
            'keywords' => 'update',
            'markdown' => 'update',
        ]);
    }
}
