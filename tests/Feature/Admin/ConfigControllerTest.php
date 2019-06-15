<?php

namespace Tests\Feature\Admin;

class ConfigControllerTest extends TestCase
{
    protected $urlPrefix = 'admin/config/';
    protected $table     = 'configs';

    protected $updateData = [
        '101' => '网站名',
    ];

    public function testBackup()
    {
        $this->adminGet('backup')->assertStatus(200);
    }

    public function testEdit()
    {
        $this->adminGet('edit')->assertStatus(200);
    }

    public function testEmail()
    {
        $this->adminGet('email')->assertStatus(200);
    }

    public function testQQQun()
    {
        $this->adminGet('qqQun')->assertStatus(200);
    }

    public function testSeo()
    {
        $this->adminGet('seo')->assertStatus(200);
    }

    public function testSocialShare()
    {
        $this->adminGet('socialShare')->assertStatus(200);
    }

    public function testUpdate()
    {
        $this->adminPost('update', $this->updateData)->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, [
            'value' => '网站名',
        ]);
    }
}
