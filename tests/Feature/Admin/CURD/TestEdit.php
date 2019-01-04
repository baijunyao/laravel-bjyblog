<?php

namespace Tests\Feature\Admin\CURD;

trait TestEdit
{
    public function testEdit()
    {
        $this->adminGet('edit/' . $this->edit_id)
            ->assertStatus(200);
    }
}
