<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected function UserGet($uri, array $headers = [])
    {
        return $this->loginByUserId(static::SOCIALITE_USER_ID, 'socialite')->get($this->urlPrefix . $uri, $headers);
    }

    protected function UserPost($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::SOCIALITE_USER_ID, 'socialite')->post($this->urlPrefix . $uri, $data, $headers);
    }

    protected function UserDelete($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::SOCIALITE_USER_ID, 'socialite')->delete($this->urlPrefix . $uri, $data, $headers);
    }
}
