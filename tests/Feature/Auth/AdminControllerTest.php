<?php

namespace Tests\Feature\Auth;

class AdminControllerTest extends TestCase
{
    public function testLogin()
    {
        $this->assertGuest('admin');
        $this->post('auth/admin/login', [
            'email'    => 'test@test.com',
            'password' => '123456',
        ]);
        $this->assertAuthenticated('admin');
    }

    public function testLoginInvalidPassword()
    {
        $this->assertGuest('admin');
        $this->post('auth/admin/login', [
            'email'    => 'test@test.com',
            'password' => '12345678',
        ])->getStatusCode(422);
        $this->assertGuest('admin');
    }
}
