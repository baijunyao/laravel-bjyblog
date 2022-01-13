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

    public function testLogin()
    {
        $this->get('login')->assertRedirect('auth/socialite/redirectToProvider/github');
    }

    public function testCategory()
    {
        $this->get('category/1')->assertRedirect('categories/1');
    }

    public function testCategoryWithSlug()
    {
        $this->get('category/1/slug')->assertRedirect('categories/1/slug');
    }

    public function testTag()
    {
        $this->get('tag/1')->assertRedirect('tags/1');
    }

    public function testTagWithSlug()
    {
        $this->get('tag/1/slug')->assertRedirect('tags/1/slug');
    }

    public function testArticle()
    {
        $this->get('article/1')->assertRedirect('articles/1');
    }

    public function testArticleWithSlug()
    {
        $this->get('article/1/slug')->assertRedirect('articles/1/slug');
    }

    public function testComment()
    {
        $this->get('comment')->assertRedirect('comments');
    }

    public function testLikeDestroy()
    {
        $this->get('like/destroy')->assertRedirect('likes/destroy');
    }

    public function testChat()
    {
        $this->get('chat')->assertRedirect('notes');
    }

    public function testNote()
    {
        $this->get('note')->assertRedirect('notes');
    }

    public function testGit()
    {
        $this->get('git')->assertRedirect('openSources');
    }

    public function testOpenSource()
    {
        $this->get('openSource')->assertRedirect('openSources');
    }

    public function testSite()
    {
        $this->get('site')->assertRedirect('sites');
    }

    public function testSocialiteUser()
    {
        $this->get('socialiteUser/1')->assertRedirect('socialiteUsers/1');
    }

    public function testFeed()
    {
        $this->get('feed')->assertRedirect('feeds');
    }

    public function testAnt()
    {
        $this->get('ant')->assertRedirect('admin');
    }
}
