<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Http\Middleware\VerifyCsrfToken;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected function adminGet($uri, array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->get($this->urlPrefix . $uri, $headers);
    }

    protected function adminPost($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->withoutMiddleware(VerifyCsrfToken::class)->post($this->urlPrefix . $uri, $data, $headers);
    }
}
