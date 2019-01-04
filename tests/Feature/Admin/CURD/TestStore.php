<?php

namespace Tests\Feature\Admin\CURD;

trait TestStore
{
    public function testStore()
    {
        $this->adminPost('store', $this->storeData)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '添加成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);

        $this->assertDatabaseHas($this->table, $this->storeData);
    }
}
