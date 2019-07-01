<?php

namespace Tests\Feature\Auth;

use App\Models\SocialiteUser;
use Mockery;
use Socialite;

class SocialiteControllerTest extends TestCase
{
    public function testRedirectToProviderForQQ()
    {
        $response = $this->get('auth/oauth/redirectToProvider/qq')->assertStatus(302);
        $url      = $response->headers->get('location');
        static::assertEquals($url, url('auth/socialite/redirectToProvider/qq'));

        $response      = $this->get($url)->assertStatus(302);
        $redirect      = 'https://graph.qq.com/oauth2.0/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fqq&scope=get_user_info&response_type=code&state=';
        static::assertStringStartsWith($redirect, $response->headers->get('location'));
    }

    public function testRedirectToProviderForWeibo()
    {
        $response = $this->get('auth/oauth/redirectToProvider/weibo')->assertStatus(302);
        $url      = $response->headers->get('location');
        static::assertEquals($url, url('auth/socialite/redirectToProvider/weibo'));

        $response      = $this->get($url)->assertStatus(302);
        $redirect      = 'https://api.weibo.com/oauth2/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fweibo&scope=&response_type=code&state=';
        static::assertStringStartsWith($redirect, $response->headers->get('location'));
    }

    public function testRedirectToProviderForGitHub()
    {
        $response = $this->get('auth/oauth/redirectToProvider/github')->assertStatus(302);
        $url      = $response->headers->get('location');
        static::assertEquals($url, url('auth/socialite/redirectToProvider/github'));

        $response      = $this->get($url)->assertStatus(302);
        $redirect      = 'https://github.com/login/oauth/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fgithub&scope=user%3Aemail&response_type=code&state=';
        static::assertStringStartsWith($redirect, $response->headers->get('location'));
    }

    public function testRedirectToProviderForVKontakte()
    {
        $response = $this->get('auth/oauth/redirectToProvider/vkontakte')->assertStatus(302);
        $url      = $response->headers->get('location');
        static::assertEquals($url, url('auth/socialite/redirectToProvider/vkontakte'));

        $response      = $this->get($url)->assertStatus(302);
        $redirect      = 'https://oauth.vk.com/authorize?client_id=&redirect_uri=http%3A%2F%2Flaravel-bjyblog.test%2Fauth%2Foauth%2FhandleProviderCallback%2Fvkontakte&scope=email&response_type=code&state=';
        static::assertStringStartsWith($redirect, $response->headers->get('location'));
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
        $this->get('auth/socialite/handleProviderCallback/qq?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(SocialiteUser::find(1), 'socialite');
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
        $this->get('auth/socialite/handleProviderCallback/weibo?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(SocialiteUser::find(3), 'socialite');
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
        $this->get('auth/socialite/handleProviderCallback/github?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(SocialiteUser::find(3), 'socialite');
    }

    public function testHandleProviderCallbackForVKontakte()
    {
        $abstractUser           = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->id       = 1;
        $abstractUser->nickname = '云淡风晴';
        $abstractUser->token    = 'token';
        $abstractUser->avatar   = 'https://avatars3.githubusercontent.com/u/9360694?s=460&v=4';

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')
            ->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('vkontakte')->andReturn($provider);
        $this->get('auth/socialite/handleProviderCallback/vkontakte?code=xxx')
            ->assertStatus(302);
        $this->assertAuthenticatedAs(SocialiteUser::find(3), 'socialite');
    }

    public function testLogout()
    {
        $this->loginByUserId(1, 'socialite');
        $this->assertAuthenticated('socialite');
        $this->get('auth/socialite/logout')->assertStatus(302);
        $this->assertGuest('socialite');
    }
}
