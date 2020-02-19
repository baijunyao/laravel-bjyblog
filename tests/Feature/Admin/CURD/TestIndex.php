<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\CURD;

trait TestIndex
{
    public function testIndex()
    {
        $this->adminGet('index')
            ->assertStatus(200);
    }
}
