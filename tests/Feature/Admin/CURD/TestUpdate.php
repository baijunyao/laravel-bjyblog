<?php

namespace Tests\Feature\Admin\CURD;

trait TestUpdate
{
    public function testUpdate()
    {
        $this->adminPost('update/' . $this->updateId, $this->updateData)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '修改成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);

        $this->assertDatabaseHas($this->table, $this->updateData);
    }
}
