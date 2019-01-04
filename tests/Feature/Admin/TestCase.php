<?php

namespace Tests\Feature\Admin;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected $urlPrefix = '';
    protected $edit_id = 1;
    protected $destroy_id = 1;
    protected $restore_id = 2;
    protected $force_delete_id = 2;

    protected function adminGet($uri, array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->get($this->urlPrefix . $uri, $headers);
    }

    protected function adminPost($uri, array $data = [], array $headers = [])
    {
        return $this->loginByUserId(static::ADMIN_USER_ID, 'admin')->post($this->urlPrefix . $uri, $data, $headers);
    }
}
