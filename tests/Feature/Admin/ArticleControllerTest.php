<?php

namespace Tests\Feature\Admin;

use App\Models\Article;
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
    protected $table     = 'articles';

    public function testUploadImage()
    {
        $file     = UploadedFile::fake()->image('article.jpg');
        $response = $this->adminPost('uploadImage', [
            'editormd-image-file' => $file,
        ])->assertJson([
            'success' => 1,
        ]);
        $content = json_decode($response->getContent(), true);
        static::assertFileExists(public_path($content['url']));
    }

    public function testStore()
    {
        $file         = UploadedFile::fake()->image('cover.jpg');
        $commonColumn = [
            'category_id' => 1,
            'title'       => 'title',
            'author'      => '白俊遥',
            'keywords'    => 'keywords',
            'markdown'    => 'content',
        ];
        $this->adminPost('store', [
            'tag_ids'     => [1],
            'description' => '',
            'cover'       => $file,
        ] + $commonColumn)->assertSessionHasAll(static::STORE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $commonColumn + [
            'description' => re_substr($commonColumn['markdown'], 0, 200, true)
        ]);

        $this->assertDatabaseHas('article_tags', [
            'article_id' => Article::where($commonColumn)->value('id'),
            'tag_id'     => 1,
        ]);
    }

    public function testUpdate()
    {
        $this->adminPost('update/' . $this->updateId, [
            'category_id' => 1,
            'title'       => 'update',
            'author'      => '白俊遥',
            'tag_ids'     => [1],
            'keywords'    => 'update',
            'markdown'    => 'update',
        ])->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas('articles', [
            'category_id' => 1,
            'title'       => 'update',
            'author'      => '白俊遥',
            'keywords'    => 'update',
            'markdown'    => 'update',
        ]);
    }

    public function testReplaceView()
    {
        $this->adminGet('replaceView')
            ->assertStatus(200);
    }

    public function testReplace()
    {
        $search  = '教程';
        $replace = '替换';
        $this->adminPost('replace', [
            'search'  => $search,
            'replace' => $replace,
        ])->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $columns = [
            'title', 'keywords', 'description', 'markdown', 'html',
        ];

        foreach ($columns as $column) {
            $this->assertDatabaseMissing('articles', [
                $column => $search,
            ]);
        }

        foreach ($columns as $column) {
            $this->assertDatabaseMissing('articles', [
                $column => $replace,
            ]);
        }
    }
}
