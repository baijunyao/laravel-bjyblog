<?php

namespace Tests\Feature\Admin\CURD;

trait TestDestroy
{
    public function testDestroy()
    {
        $this->adminGet('destroy/' . $this->destroyId)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '删除成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);
    }
}
