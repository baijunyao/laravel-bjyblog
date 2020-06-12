@extends('github.layouts.home')

@section('title', $head['title'] ?? '')

@section('keywords', $head['keywords'] ?? '')

@section('description', $head['description'] ?? '')

@section('content')

    <div class="application-main " data-commit-hovercards-enabled="">
        <main id="js-pjax-container" data-pjax-container="">

            <div class="container-xl clearfix px-3 mt-4">
                <div class="h-card col-lg-3 col-md-4 col-12 float-md-left pr-md-3 pr-xl-6"
                     data-acv-badge-hovercards-enabled="" itemscope="" itemtype="http://schema.org/Person">

                    <div class="user-profile-sticky-bar js-user-profile-sticky-bar">
                        <div class="user-profile-mini-vcard d-table">
                        <span class="user-profile-mini-avatar d-table-cell v-align-middle lh-condensed-ultra pr-2">
                            <img class="rounded-1 avatar-user" height="32" width="32" alt="@baijunyao"
                                 src="https://avatars3.githubusercontent.com/u/9360694?s=88&amp;u=7c4503ac0541f894741d32bc1d7cbddd811b5b0e&amp;v=4">
                        </span>
                            <span class="d-table-cell v-align-middle lh-condensed js-user-profile-following-mini-toggle">
                            <strong>baijunyao</strong>
                        </span>
                        </div>
                    </div>

                    <div class="clearfix">
                        <div class="float-left col-3 col-md-12 pr-3 pr-md-0">
                            <a itemprop="image" class="u-photo d-block position-relative" aria-hidden="true"
                               href="{{ url('images/theme/github/avatar.jpeg') }}"><img
                                    alt="" width="260" height="260"
                                    class="avatar width-full height-full avatar-before-user-status"
                                    src="{{ url('images/theme/github/avatar.jpeg') }}"></a>
                        </div>

                        <div
                            class="vcard-names-container float-left col-9 col-md-12 pt-1 pt-md-3 pb-1 pb-md-3 js-user-profile-sticky-fields is-placeholder"
                            style="visibility: hidden; display: none; height: 86px;"></div>
                        <div
                            class="vcard-names-container float-left col-9 col-md-12 pt-1 pt-md-3 pb-1 pb-md-3 js-sticky js-user-profile-sticky-fields"
                            data-original-top="0px"
                            style="position: static; top: 0px !important; left: 400px; width: 272px;">
                            <h1 class="vcard-names pl-2 pl-md-0">
                                <span class="p-name vcard-fullname d-block overflow-hidden" itemprop="name">白俊遥</span>
                                <span class="p-nickname vcard-username d-block" itemprop="additionalName">baijunyao</span>
                            </h1>
                        </div>
                    </div>

                    <div class="d-none d-md-block">
                        <div class="js-profile-editable-area">
                            <div class="p-note user-profile-bio mb-2 js-user-profile-bio"></div>
                            <ul class="vcard-details mb-3">
                                <li itemprop="homeLocation" show_title="false" aria-label="Home location: Beijing,China"
                                    class="vcard-detail pt-1 css-truncate css-truncate-target">
                                    <svg class="octicon octicon-location" viewBox="0 0 12 16" version="1.1" width="12"
                                         height="16" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M6 0C2.69 0 0 2.5 0 5.5 0 10.02 6 16 6 16s6-5.98 6-10.5C12 2.5 9.31 0 6 0zm0 14.55C4.14 12.52 1 8.44 1 5.5 1 3.02 3.25 1 6 1c1.34 0 2.61.48 3.56 1.36.92.86 1.44 1.97 1.44 3.14 0 2.94-3.14 7.02-5 9.05zM8 5.5c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path>
                                    </svg>
                                    <span class="p-label">Beijing,China</span>
                                </li>
                                <li itemprop="url" data-test-selector="profile-website-url"
                                    class="vcard-detail pt-1 css-truncate css-truncate-target">
                                    <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16"
                                         height="16" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                                    </svg>
                                    <a rel="nofollow me" href="https://baijunyao.com">https://baijunyao.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-top py-3 clearfix hide-sm hide-md">
                        <h2 class="mb-1 h4">Organizations</h2>
                        @foreach(config('bjyblog.social_links') as $name => $link)
                            @if($link !== '' && $name !== 'upyun')
                                <a aria-label="{{ $name }}" itemprop="follows" class="avatar-group-item" href="{{ $link }}" target="{{ config('bjyblog.link_target') }}">
                                    <img alt="{{ $name }}" width="32" height="32"
                                         src="{{ url("images/home/social-$name.png") }}" class="avatar ">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-12 d-md-none">


                    <div class="js-profile-editable-area">

                        <div class="p-note user-profile-bio mb-2 js-user-profile-bio"></div>

                        <ul class="vcard-details mb-3">

                            <li itemprop="homeLocation" show_title="false" aria-label="Home location: Beijing,China"
                                class="vcard-detail pt-1 css-truncate css-truncate-target">
                                <svg class="octicon octicon-location" viewBox="0 0 12 16" version="1.1" width="12"
                                     height="16" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M6 0C2.69 0 0 2.5 0 5.5 0 10.02 6 16 6 16s6-5.98 6-10.5C12 2.5 9.31 0 6 0zm0 14.55C4.14 12.52 1 8.44 1 5.5 1 3.02 3.25 1 6 1c1.34 0 2.61.48 3.56 1.36.92.86 1.44 1.97 1.44 3.14 0 2.94-3.14 7.02-5 9.05zM8 5.5c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path>
                                </svg>
                                <span class="p-label">Beijing,China</span>
                            </li>

                            <li itemprop="url" data-test-selector="profile-website-url"
                                class="vcard-detail pt-1 css-truncate css-truncate-target">
                                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                                </svg>
                                <a rel="nofollow me" href="https://baijunyao.com">https://baijunyao.com</a>
                            </li>

                        </ul>

                    </div>

                </div>

                <div class="col-lg-9 col-md-8 col-12 float-md-left pl-md-2">


                    <div class="UnderlineNav width-full user-profile-nav top-0 is-placeholder"
                         style="visibility: hidden; display: none; height: 55px;"></div>

                    <div class="UnderlineNav width-full user-profile-nav js-sticky top-0" data-original-top="0px" style="position: static; top: 0px !important; left: 720px; width: 928px;">
                        <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="1be5e685491b2ef9965f2228202b3de0e869c57bc21d38a376df4d567010d1e2" href="/baijunyao">
                                Overview
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_REPOSITORIES&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="67684141da47c0bdd36aaa7d59e43ba8e8555162638846bebc3bb1155f9680ca" href="/baijunyao?tab=repositories">
                                Repositories
                                <span class="Counter hide-lg hide-md hide-sm">
            89
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="6c439df272f381fe85ea3ffc19e85d7ec02f16db95d98eb842232f249644332b" href="/baijunyao?tab=projects">
                                Projects
                                <span class="Counter hide-lg hide-md hide-sm">
            0
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="6b5eb8d5e18651bacd1e9ac342cf6402de7bed6b6c0a07114c3e0bcdea05ac57" href="/baijunyao?tab=packages">
                                Packages
                                <span class="Counter hide-lg hide-md hide-sm">
              1
            </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_STARS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="6c0abfee77da509c89f229aa7d0b02801e7720fd9868f4ec9d2da09276aa0fcf" href="/baijunyao?tab=stars">
                                Stars
                                <span class="Counter hide-lg hide-md hide-sm">
            3.1k
          </span>
                            </a>
                            <a aria-current="page" class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 selected " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWERS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="fdba4740b7d8f6d4fd312fed1a427e59602c8571beb7919aace6b10ec0564e62" href="/baijunyao?tab=followers">
                                Followers
                                <span class="Counter hide-lg hide-md hide-sm">
            536
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWING&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=followers&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="a15636dc94610c7336044dc6eebe9ccdd5721315192a7598cd9f1c3222f60547" href="/baijunyao?tab=following">
                                Following
                                <span class="Counter hide-lg hide-md hide-sm">
            69
          </span>
                            </a>      </nav>
                    </div>

                    <div class="position-relative">

                        @foreach($socialiteUsers as $socialiteUser)
                            <div class="d-table table-fixed col-12 width-full py-4 border-bottom border-gray-light">
                                <div class="d-table-cell col-2 col-lg-1 v-align-top">
                                    <a class="d-inline-block" data-hovercard-type="user" data-hovercard-url="/users/hnlixf/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/hnlixf">
                                        <img class="avatar avatar-user" src="{{ url($socialiteUser->avatar) }}" width="50" height="50" alt="@hnlixf">
                                    </a>
                                </div>

                                <div class="d-table-cell col-9 v-align-top pr-3">
                                    <a class="d-inline-block no-underline mb-1" data-hovercard-type="user" data-hovercard-url="/users/hnlixf/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/hnlixf">
                                        <span class="f4 link-gray-dark"></span>
                                        <span class="link-gray">{{ $socialiteUser->name }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
