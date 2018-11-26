<?php

namespace Tests\Feature;

use App\Models\OauthUser;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function loginByUserId($userId)
    {
        $user = OauthUser::select('id', 'email', 'name', 'type', 'is_admin', 'avatar')
            ->where('id', $userId)
            ->first()
            ->toArray();
        $session = [
            'user' => $user
        ];
        return $this->withSession($session);
    }
}
