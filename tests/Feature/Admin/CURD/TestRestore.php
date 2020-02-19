<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\CURD;

trait TestRestore
{
    public function testRestore()
    {
        $this->adminGet('restore/' . $this->restoreId)
            ->assertSessionHasAll(static::RESTORE_SUCCESS_MESSAGE);
    }
}
