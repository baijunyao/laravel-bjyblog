<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\CURD;

trait TestUpdate
{
    public function testUpdate()
    {
        $this->adminPost('update/' . $this->updateId, $this->updateData)
            ->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $this->updateData);
    }
}
