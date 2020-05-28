@extends('github.layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

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
                    <div class="UnderlineNav width-full user-profile-nav js-sticky top-0" data-original-top="0px"
                         style="position: static; top: 0px !important; left: 720px; width: 928px;">
                        <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                            <a aria-current="page" class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 selected "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="a9a7f35540d986738e7ac72355d6c9ea5b01c9c032336a05f7e32959bc42bd05"
                               href="/baijunyao">
                                Overview
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_REPOSITORIES&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="e7f95b1fb793606e452b95f68cd3edb93158f43c5c99f485d8a2f779f4ddc931"
                               href="/baijunyao?tab=repositories">
                                Repositories
                                <span class="Counter hide-lg hide-md hide-sm">
        89
    </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="5d2568553504bd71e186c79db09d100b4dde384f7702a0aaa57e1ae8c627086b"
                               href="/baijunyao?tab=projects">
                                Projects
                                <span class="Counter hide-lg hide-md hide-sm">
    0
</span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="550b53c651c775d2bd1e2fad7d7ed34bc88af265ce6ac9d153a7be03170762ac"
                               href="/baijunyao?tab=packages">
                                Packages
                                <span class="Counter hide-lg hide-md hide-sm">
  1
</span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_STARS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="fecdbe2d8995c6aca7e35a8c6dc8a4fe1a4eb69125851f51eb62d4297bcfa3f9"
                               href="/baijunyao?tab=stars">
                                Stars
                                <span class="Counter hide-lg hide-md hide-sm">
    3k
</span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWERS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="713e7160a95181f9c3639ca51b04b5c9a31a4091be6516a9514140002464aa08"
                               href="/baijunyao?tab=followers">
                                Followers
                                <span class="Counter hide-lg hide-md hide-sm">
    535
</span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 "
                               data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWING&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;}}"
                               data-hydro-click-hmac="3b02e970076ad6a4aecde3a5379c399b382dbebae0b41be132e2dbb1e61813af"
                               href="/baijunyao?tab=following">
                                Following
                                <span class="Counter hide-lg hide-md hide-sm">
    69
</span>
                            </a></nav>
                    </div>

                    <div class="position-relative">

                        <div class="mt-4">

                            <div class="js-pinned-items-reorder-container">
                                <h2 class="f4 mb-2 text-normal">
                                    Pinned
                                    <img src="https://github.githubassets.com/images/spinners/octocat-spinner-32.gif"
                                         width="13" class="spinner pinned-items-spinner js-pinned-items-spinner" alt="">
                                    <span class="ml-2 text-gray f6 js-pinned-items-reorder-message" role="status"
                                          aria-live="polite" data-error-text="Something went wrong."
                                          data-success-text="Order updated."></span>
                                </h2>


                                <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4 js-pinned-items-reorder-list">
                                    @foreach($pinnedArticles as $article)
                                        <li class="col-12 col-md-6 col-lg-6 mb-3 d-flex flex-content-stretch">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full js-pinned-item-list-item public source  sortable-button-item">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <svg class="octicon octicon-repo mr-2 text-gray flex-shrink-0" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path>
                                                        </svg>
                                                        <a href="{{ $article->url }}" class="text-bold flex-auto min-width-0 ">
                                                            <span class="repo" title="laravel-bjyblog">{{ $article->title }}</span>
                                                        </a>
                                                    </div>

                                                    <p class="pinned-item-desc text-gray text-small d-block mt-2 mb-3">
                                                        {{ $article->description }}
                                                    </p>

                                                    <p class="mb-0 f6 text-gray">
                                                        <a href="{{ $article->category->url }}" class="pinned-item-meta muted-link ">
                                                        <span class="d-inline-block mr-3">
                                                        <span class="repo-language-color" style="background-color: #4F5D95"></span>
                                                        <span itemprop="programmingLanguage">{{ $article->category->name }}</span>
                                                    </span>
                                                        </a>

                                                        <svg class="octicon octicon-tag" viewBox="0 0 15 16" version="1.1" width="15" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.73 1.73C7.26 1.26 6.62 1 5.96 1H3.5C2.13 1 1 2.13 1 3.5v2.47c0 .66.27 1.3.73 1.77l6.06 6.06c.39.39 1.02.39 1.41 0l4.59-4.59a.996.996 0 000-1.41L7.73 1.73zM2.38 7.09c-.31-.3-.47-.7-.47-1.13V3.5c0-.88.72-1.59 1.59-1.59h2.47c.42 0 .83.16 1.13.47l6.14 6.13-4.73 4.73-6.13-6.15zM3.01 3h2v2H3V3h.01z"></path></svg>

                                                        @foreach($article->tags as $tag)
                                                            <a href="{{ $tag->url }}" class="pinned-item-meta muted-link ">
                                                                {{ $tag->name }}
                                                            </a>
                                                            &emsp;
                                                        @endforeach

                                                        <svg class="octicon octicon-eye v-align-text-bottom" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
                                                        {{ $article->views }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>

                            </div>

                        </div>

                        <div class="mt-4 position-relative">

                            <div class="d-flex">
                                <div class="col-12 col-lg-10">
                                    <div class="js-yearly-contributions">
                                        <div class="position-relative">
                                            <h2 class="f4 text-normal mb-2">
                                                {{ $yearArticles->count() }} contributions
                                                in the {{ $selectedYear->year }}
                                            </h2>
                                            <div class="border border-gray-dark py-2 graph-before-activity-overview">
                                                <div
                                                    class="js-calendar-graph mx-3 d-flex flex-column flex-items-end flex-xl-items-center overflow-hidden pt-1 is-graph-loading graph-canvas calendar-graph height-full text-center"
                                                    data-graph-url="/users/baijunyao/contributions?to=2020-05-14"
                                                    data-url="/baijunyao" data-from="2019-05-12 00:00:00 UTC"
                                                    data-to="2020-05-14 23:59:59 UTC" data-org="">

                                                    <svg width="722" height="112">
                                                        <g transform="translate(10, 20)">
                                                            @foreach($calendarGraph as $calendars)
                                                                <g transform="translate({{ $loop->index * 14 }}, 0)">
                                                                    @foreach($calendars as $calendar)
                                                                        <rect class="day" width="10" height="10" x="{{ $calendar['x'] }}" y="{{ $calendar['y'] }}"
                                                                          fill="{{ $calendar['fill'] }}" data-count="{{ $calendar['count'] }}"
                                                                          data-date="{{ $calendar['date'] }}"></rect>
                                                                    @endforeach
                                                                </g>
                                                            @endforeach

                                                            <text x="14" y="-7" class="month">May</text>
                                                            <text x="53" y="-7" class="month">Jun</text>
                                                            <text x="118" y="-7" class="month">Jul</text>
                                                            <text x="170" y="-7" class="month">Aug</text>
                                                            <text x="222" y="-7" class="month">Sep</text>
                                                            <text x="287" y="-7" class="month">Oct</text>
                                                            <text x="339" y="-7" class="month">Nov</text>
                                                            <text x="391" y="-7" class="month">Dec</text>
                                                            <text x="456" y="-7" class="month">Jan</text>
                                                            <text x="508" y="-7" class="month">Feb</text>
                                                            <text x="560" y="-7" class="month">Mar</text>
                                                            <text x="625" y="-7" class="month">Apr</text>
                                                            <text x="677" y="-7" class="month">May</text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="8"
                                                                  style="display: none;">Sun
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="22">Mon
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="32"
                                                                  style="display: none;">Tue
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="48">Wed
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="57"
                                                                  style="display: none;">Thu
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="73">Fri
                                                            </text>
                                                            <text text-anchor="start" class="wday" dx="-10" dy="81"
                                                                  style="display: none;">Sat
                                                            </text>
                                                        </g>
                                                    </svg>

                                                </div>
                                                <div class="contrib-footer clearfix mt-1 mx-3 px-3 pb-1">
                                                    <div class="float-left text-gray">


                                                        <a href="https://help.github.com/articles/why-are-my-contributions-not-showing-up-on-my-profile"
                                                           class="">
                                                            Learn how we count contributions</a>.
                                                    </div>
                                                    <div class="contrib-legend text-gray"
                                                         title="A summary of pull requests, issues opened, and commits to the default and gh-pages branches.">
                                                        Less
                                                        <ul class="legend">
                                                            <li style="background-color: #ebedf0"></li>
                                                            <li style="background-color: #c6e48b"></li>
                                                            <li style="background-color: #7bc96f"></li>
                                                            <li style="background-color: #239a3b"></li>
                                                            <li style="background-color: #196127"></li>
                                                        </ul>
                                                        More
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div id="js-contribution-activity" class="activity-listing contribution-activity"
                                         data-pjax-container="">


                                        <h2 class="f4 text-normal mb-2">
                                            Contribution activity
                                        </h2>


                                        <div class="contribution-activity-listing float-left col-12 ">
                                            <div class="profile-timeline discussion-timeline width-full pb-4">
                                                <h3 class="profile-timeline-month-heading bg-white d-inline-block h6 pr-2 py-1">
                                                    <span class="text-gray">{{ $selectedYear->year }}</span>
                                                </h3>
                                                <div class="profile-rollup-wrapper py-4 pl-4 position-relative ml-3 js-details-container Details open">
                                                <span class="discussion-item-icon">
                                                    <svg class="octicon octicon-repo" viewBox="0 0 12 16" version="1.1" width="12"
                                                         height="16" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path>
                                                    </svg>
                                                </span>
                                                    <button type="button" class="btn-link f4 muted-link no-underline lh-condensed width-full js-details-target " aria-expanded="false">
                                                        <span class="float-left ws-normal text-left">Created {{ $yearArticles->count() }} articles</span>
                                                        <span class="d-inline-block float-right">
                                                        <span class="profile-rollup-toggle-closed float-right" aria_label="Collapse">
                                                            <svg class="octicon octicon-fold" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M7 9l3 3H8v3H6v-3H4l3-3zm3-6H8V0H6v3H4l3 3 3-3zm4 2c0-.55-.45-1-1-1h-2.5l-1 1h3l-2 2h-7l-2-2h3l-1-1H1c-.55 0-1 .45-1 1l2.5 2.5L0 10c0 .55.45 1 1 1h2.5l1-1h-3l2-2h7l2 2h-3l1 1H13c.55 0 1-.45 1-1l-2.5-2.5L14 5z"></path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    </button>
                                                    <ul class="profile-rollup-content mt-1" data-repository-hovercards-enabled="">
                                                        @foreach($yearArticles as $article)
                                                            <li class="d-block mt-1 py-1">
                                                                <span class="css-truncate">
                                                                    <span class="profile-rollup-icon">
                                                                        <svg class="octicon octicon-repo-forked v-align-middle text-gray-light mr-1" viewBox="0 0 10 16" version="1.1" width="10" height="16" aria-hidden="true">
                                                                            <path fill-rule="evenodd" d="M8 1a1.993 1.993 0 00-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 002 1a1.993 1.993 0 00-1 3.72V6.5l3 3v1.78A1.993 1.993 0 005 15a1.993 1.993 0 001-3.72V9.5l3-3V4.72A1.993 1.993 0 008 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <a class="mr-2" href="{{ $article->url }}">{{ $article->title }}</a>
                                                                </span>
                                                                <time title="This contribution was made on May 13" class="float-right f6 text-gray-light pt-1">
                                                                    {{ $article->created_at->format('M j') }}
                                                                </time>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="year-list-container" class="col-12 col-lg-2 pl-5 hide-sm hide-md hide-lg">

                                    <div class="d-none d-lg-block">
                                        <div
                                            class="profile-timeline-year-list js-profile-timeline-year-list bg-white is-placeholder"
                                            style="visibility: hidden; display: none; height: 286px;"></div>
                                        <div
                                            class="profile-timeline-year-list js-profile-timeline-year-list bg-white js-sticky"
                                            data-original-top="74px"
                                            style="position: static; top: 74px !important; left: 1525.33px; width: 122.656px;">
                                            <ul class="filter-list small">
                                                @foreach($calendarGraphYears as $calendarGraphYear)
                                                    <li>
                                                        <a id="year-link-{{ $calendarGraphYear }}" class="filter-item px-3 mb-2 py-2 @if($selectedYear->year === $calendarGraphYear) selected @endif" aria-label="Contribution activity in {{ $calendarGraphYear }}" href="{{ url('/') . '?year=' . $calendarGraphYear }}">{{ $calendarGraphYear }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
