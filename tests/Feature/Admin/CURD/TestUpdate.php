<?php

namespace Tests\Feature\Admin\CURD;

trait TestUpdate
{
    public function testUpdate()
    {
        $this->adminGet('store', $this->updateData)->assertSessionHasAll([
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
