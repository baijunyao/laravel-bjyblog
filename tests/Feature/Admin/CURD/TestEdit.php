<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\CURD;

trait TestEdit
{
    public function testEdit()
    {
        $this->adminGet('edit/' . $this->editId)
            ->assertStatus(200);
    }
}
