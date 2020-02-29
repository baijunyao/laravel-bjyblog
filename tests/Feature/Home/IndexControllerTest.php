<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class IndexControllerTest extends TestCase
{
    public function testCheckLoginWhenLogin()
    {
        auth()->guard('socialite')->loginUsingId(1);

        $this->get('/checkLogin')->assertStatus(200)->assertJson([
            'status' => 1,
        ]);
    }

    public function testCheckLoginWhenLogout()
    {
        $this->get('/checkLogin')->assertStatus(200)->assertJson([
            'status' => 0,
        ]);
    }

    public function testFeed()
    {
        $this->get('/feed')->assertStatus(200);
    }
}
