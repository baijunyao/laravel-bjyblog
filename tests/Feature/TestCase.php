<?php

namespace Tests\Feature;

use App\Models\OauthUser;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function loginByUserId($userId)
    {
        $user = OauthUser::find($userId);
        return $this->actingAs($user, 'oauth');
    }
}
