<?php

namespace Tests\Feature\Auth;

use App\Models\OauthUser;
use Mockery;
use Socialite;

class OAuthControllerTest extends TestCase
{
    public function testRedirectToProviderForQQ()
    {
        $response = $this->get('auth/oauth/redirectToProvider/qq')->assertStatus(302);
        $url      = 'https://graph.qq.com/oauth2.0/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fqq&scope=get_user_info&response_type=code&state=';
        static::assertStringStartsWith($url, $response->headers->get('location'));
    }

    public function testRedirectToProviderForWeibo()
    {
        $response = $this->get('auth/oauth/redirectToProvider/weibo')->assertStatus(302);
        $url      = 'https://api.weibo.com/oauth2/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fweibo&scope=&response_type=code&state=';
        static::assertStringStartsWith($url, $response->headers->get('location'));
    }

    public function testRedirectToProviderForGitHub()
    {
        $response = $this->get('auth/oauth/redirectToProvider/github')->assertStatus(302);
        $url      = 'https://github.com/login/oauth/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fgithub&scope=user%3Aemail&response_type=code&state=';
        static::assertStringStartsWith($url, $response->headers->get('location'));
    }

    public function testHandleProviderCallbackForQQ()
    {
        $abstractUser           = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->id       = 1;
        $abstractUser->nickname = '云淡风晴';
        $abstractUser->token    = 'token';
        $abstractUser->avatar   = 'https://avatars3.githubusercontent.com/u/9360694?s=460&v=4';

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')
            ->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('qq')->andReturn($provider);
        $this->get('auth/oauth/handleProviderCallback/qq?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(OauthUser::find(1), 'oauth');
    }

    public function testHandleProviderCallbackForWeibo()
    {
        $abstractUser           = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->id       = 1;
        $abstractUser->nickname = '云淡风晴';
        $abstractUser->token    = 'token';
        $abstractUser->avatar   = 'https://avatars3.githubusercontent.com/u/9360694?s=460&v=4';

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')
            ->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('weibo')->andReturn($provider);
        $this->get('auth/oauth/handleProviderCallback/weibo?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(OauthUser::find(3), 'oauth');
    }

    public function testHandleProviderCallbackForGitHub()
    {
        $abstractUser           = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->id       = 1;
        $abstractUser->nickname = '云淡风晴';
        $abstractUser->token    = 'token';
        $abstractUser->avatar   = 'https://avatars3.githubusercontent.com/u/9360694?s=460&v=4';

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')
            ->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('github')->andReturn($provider);
        $this->get('auth/oauth/handleProviderCallback/github?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(OauthUser::find(3), 'oauth');
    }

    public function testLogout()
    {
        $this->loginByUserId(1, 'oauth');
        $this->assertAuthenticated('oauth');
        $this->get('auth/oauth/logout')->assertStatus(302);
        $this->assertGuest('oauth');
    }
}
