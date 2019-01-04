<?php

namespace Tests\Feature\Admin\CURD;

trait TestRestore
{
    public function testRestore()
    {
        $this->adminGet('restore/' . $this->restore_id)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '恢复成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);
    }
}
