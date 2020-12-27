<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

use App\Models\SocialiteUser;

class SocialiteUserControllerTest extends TestCase
{
    public function testCheckLoginWhenLogin()
    {
        auth()->guard('socialite')->loginUsingId(1);

        $this->get('/socialiteUser/me')
            ->assertStatus(200)
            ->assertJson(SocialiteUser::find(1)->only('id', 'name', 'avatar', 'email'));
    }

    public function testCheckLoginWhenLogout()
    {
        $this->get('/socialiteUser/me')
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
