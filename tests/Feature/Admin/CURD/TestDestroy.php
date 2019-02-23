<?php

namespace Tests\Feature\Admin\CURD;

trait TestDestroy
{
    public function testDestroy()
    {
        $this->adminGet('destroy/' . $this->destroyId)
            ->assertSessionHasAll(static::DESTROY_SUCCESS_MESSAGE);
    }
}
