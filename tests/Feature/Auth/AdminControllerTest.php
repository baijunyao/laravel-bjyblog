<?php

namespace Tests\Feature\Auth;

class AdminControllerTest extends \Tests\Feature\TestCase
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
}
