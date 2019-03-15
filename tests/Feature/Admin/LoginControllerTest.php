<?php

namespace Tests\Feature\Admin;

class LoginControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('admin/login/index')
            ->assertStatus(200);
    }

    public function testLogout()
    {
        $this->loginByUserId(1, 'admin');
        $this->get('admin/login/logout')
            ->assertStatus(302);
        $this->assertGuest('admin');
    }
}
