<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Tests\Feature\Admin\CURD\TestUpdate;

class CommentControllerTest extends TestCase
{
    use TestIndex, TestUpdate, TestDestroy, TestRestore, TestForceDelete;
    protected $urlPrefix = 'admin/comment/';
    protected $table     = 'comments';

    protected $updateData = [
        'content'    => 'Updated Content',
        'is_audited' => 0,
    ];

    public function testReplaceView()
    {
        $this->adminGet('replaceView')
            ->assertStatus(200);
    }

    public function testReplace()
    {
        $this->adminPost('replace', [
            'search'  => '评论',
            'replace' => '替换',
        ])->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseMissing('comments', [
            'content' => '评论的内容',
        ]);

        $this->assertDatabaseHas('comments', [
            'content' => '替换的内容',
        ]);
    }
}
