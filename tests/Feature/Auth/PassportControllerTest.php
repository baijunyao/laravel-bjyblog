<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Laravel\Passport\Passport;

class PassportControllerTest extends TestCase
{
    public function testLogout()
    {
        Passport::actingAs(User::find(1));

        $this->post('api/auth/passport/logout')->assertOk();
    }
}
