<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigControllerTest extends TestCase
{
    protected $urlPrefix = 'admin/config/';
    protected $table = 'configs';

    protected $updateData = [
        '101' => '网站名',
    ];

    public function testEdit()
    {
        $this->adminGet('edit')
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        $this->adminPost('update', $this->updateData)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '操作成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);

        $this->assertDatabaseHas($this->table, [
            'value' => '网站名',
        ]);
    }
}
