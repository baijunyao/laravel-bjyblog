<?php

namespace Tests\Feature\Admin\CURD;

trait TestStore
{
    public function testStore()
    {
        $this->adminPost('store', $this->storeData)
            ->assertSessionHasAll(static::STORE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $this->storeData);
    }
}
