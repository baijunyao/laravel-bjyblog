<?php

namespace Tests\Feature\Admin;

use Tests\Feature\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function adminGet($uri, array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->get($uri, $headers);
    }

    public function adminPost($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->post($uri, $data, $headers);
    }
}
