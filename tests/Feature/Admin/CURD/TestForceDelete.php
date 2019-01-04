<?php

namespace Tests\Feature\Admin\CURD;

trait TestForceDelete
{
    public function testForceDelete()
    {
        $this->adminGet('forceDelete/' . $this->force_delete_id)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '彻底删除成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);
    }
}
