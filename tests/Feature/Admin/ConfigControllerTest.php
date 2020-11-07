<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

class ConfigControllerTest extends TestCase
{
    protected $urlPrefix = 'admin/config/';
    protected $table     = 'configs';

    protected $updateData = [
        '101' => '网站名',
    ];

    public function testView()
    {
        $views = [
            'email', 'commentAudit', 'qqQun', 'backup', 'upload', 'seo', 'socialShare', 'socialLinks', 'search', 'licenses',
        ];

        foreach ($views as $view) {
            $this->adminGet($view)->assertStatus(200);
        }
    }

    public function testUpdate()
    {
        $this->adminPost('update', $this->updateData)->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, [
            'value' => '网站名',
        ]);
    }
}
