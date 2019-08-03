<?php

namespace Tests\Feature\Auth;

class ApiControllerTest extends TestCase
{
    public function testLogin()
    {
        $this->assertGuest('api');
        $response = $this->post(route('passport.token'), [
            'grant_type'  => 'password',
            'client_id'   => 1,
            'scope'       => '',
            'username'    => 'test@test.com',
            'password'    => '123456',
        ]);
        $this->assertResponse($response, [], [
            '/"expires_in":\d+/'      => '"expires_in":"expires_in_ignore"',
            '/"access_token":".*"/U'  => '"access_token":"access_token_ignore"',
            '/"refresh_token":".*"/U' => '"refresh_token":"refresh_token_ignore"',
        ]);
    }

    public function testLoginInvalidPassword()
    {
        $this->assertGuest('api');

        $this->assertResponse(
            $this->post(route('passport.token'), [
                'grant_type'  => 'password',
                'client_id'   => 1,
                'scope'       => '',
                'username'    => 'test@test.com',
                'password'    => '12345678',
            ])
        );
    }

    public function testGuest()
    {
        $this->assertGuest('api');

        $this->assertResponse(
            $this->getJson(route('articles.index'))
        );
    }
}
