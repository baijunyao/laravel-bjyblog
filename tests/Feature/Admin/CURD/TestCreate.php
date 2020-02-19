<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\CURD;

trait TestCreate
{
    public function testCreate()
    {
        $this->adminGet('create')
            ->assertStatus(200);
    }
}
