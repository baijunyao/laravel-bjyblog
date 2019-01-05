<?php

namespace Tests\Feature\Admin;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected function adminGet($uri, array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->get($this->urlPrefix . $uri, $headers);
    }

    protected function adminPost($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->post($this->urlPrefix . $uri, $data, $headers);
    }
}
