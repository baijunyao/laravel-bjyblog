<?php

namespace Tests\Feature\Admin\CURD;

trait TestIndex
{
    public function testIndex()
    {
        $this->adminGet('index')
            ->assertStatus(200);
    }
}
