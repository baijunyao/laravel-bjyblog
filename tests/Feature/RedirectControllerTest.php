<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirectToProvider()
    {
        $this->get('auth/oauth/redirectToProvider/github')->assertRedirect('auth/socialite/redirectToProvider/github');
    }

    public function testHandleProviderCallback()
    {
        $this->get('auth/oauth/handleProviderCallback/github?code=xxx')->assertRedirect('auth/socialite/handleProviderCallback/github?code=xxx');
    }

    public function testLogout()
    {
        $this->get('auth/oauth/logout')->assertRedirect('auth/socialite/logout');
    }

    public function testNote()
    {
        $this->get('chat')->assertRedirect('note');
    }

    public function testOpenSource()
    {
        $this->get('git')->assertRedirect('openSource');
    }

    public function testLogin()
    {
        $this->get('login')->assertRedirect('auth/socialite/redirectToProvider/github');
    }
}
