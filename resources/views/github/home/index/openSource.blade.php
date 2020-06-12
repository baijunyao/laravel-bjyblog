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
                    <div class="UnderlineNav width-full user-profile-nav js-sticky top-0" data-original-top="0px" style="position: static;">
                        <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " href="{{ url('/') }}">
                                Overview
                            </a>
                            <a aria-current="page" class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 selected " href="{{ url('openSource') }}">
                                Repositories
                                <span class="Counter hide-lg hide-md hide-sm">
            {{ $openSources->count() }}
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=repositories&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="0d1788c72e436ac6019968a421c79d3fb05f774c9de0448e2a0a1442f421af7a" href="/baijunyao?tab=projects">
                                Projects
                                <span class="Counter hide-lg hide-md hide-sm">
            0
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=repositories&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="5928df74f4c32c10cfe521f798242a35f435e365d37bed4c013e4bba4a776457" href="/baijunyao?tab=packages">
                                Packages
                                <span class="Counter hide-lg hide-md hide-sm">
              1
            </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_STARS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=repositories&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="24f5d70af5fbf437ad762f5bc4d144f356a11f2ee29b33db72b30d59c00a801f" href="/baijunyao?tab=stars">
                                Stars
                                <span class="Counter hide-lg hide-md hide-sm">
            3.1k
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWERS&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=repositories&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="fe388fa0292a48ee6b26264a971d658bb4cb3a4a4d4fe57245c193ca862cd4a1" href="/baijunyao?tab=followers">
                                Followers
                                <span class="Counter hide-lg hide-md hide-sm">
            538
          </span>
                            </a>
                            <a class="UnderlineNav-item mr-0 mr-md-1 mr-lg-3 " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:9360694,&quot;target&quot;:&quot;TAB_FOLLOWING&quot;,&quot;user_id&quot;:null,&quot;originating_url&quot;:&quot;https://github.com/baijunyao?tab=repositories&amp;_pjax=%23js-pjax-container&quot;}}" data-hydro-click-hmac="d863234a8d2622f909c9ffa6060881afe455253f73bc7e4c64106d0c552e0842" href="/baijunyao?tab=following">
                                Following
                                <span class="Counter hide-lg hide-md hide-sm">
            70
          </span>
                            </a>      </nav>
                    </div>

                    <div class="position-relative">


                        <div class="border-bottom border-gray-dark py-3">
                            <!-- '"` --><!-- </textarea></xmp> --><form class="d-block d-md-flex" data-autosearch-results-container="user-repositories-list" aria-label="Repositories" role="search" action="/baijunyao" accept-charset="UTF-8" method="get">
                                <div class="mb-3 mb-md-0 mr-md-3 flex-auto">
                                    <input type="hidden" name="tab" value="repositories">
                                    <input type="search" id="your-repos-filter" name="q" class="form-control width-full" placeholder="Find a repository…" autocomplete="off" aria-label="Find a repository…" value="" data-throttled-autosubmit="">
                                </div>

                                <div class="d-flex">
                                    <details class="details-reset details-overlay position-relative mr-2" id="type-options">
                                        <summary class="btn" aria-haspopup="menu" role="button">
                                            <i>Type:</i>
                                            <span data-menu-button="">
            All
          </span>
                                            <span class="dropdown-caret"></span>
                                        </summary>

                                        <details-menu class="SelectMenu right-md-0" role="menu">
                                            <div class="SelectMenu-modal">
                                                <header class="SelectMenu-header">
                                                    <span class="SelectMenu-title">Select type</span>
                                                    <button class="SelectMenu-closeButton" type="button" data-toggle-for="type-options"><svg aria-label="Close menu" class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" role="img"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg></button>
                                                </header>
                                                <div class="SelectMenu-list">
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="true" tabindex="0">
                                                        <input type="radio" name="type" id="type_" value="" hidden="hidden" data-autosubmit="true" checked="checked">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">All</span>
                                                    </label>
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="false" tabindex="0">
                                                        <input type="radio" name="type" id="type_source" value="source" hidden="hidden" data-autosubmit="true">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">Sources</span>
                                                    </label>
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="false" tabindex="0">
                                                        <input type="radio" name="type" id="type_fork" value="fork" hidden="hidden" data-autosubmit="true">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">Forks</span>
                                                    </label>
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="false" tabindex="0">
                                                        <input type="radio" name="type" id="type_archived" value="archived" hidden="hidden" data-autosubmit="true">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">Archived</span>
                                                    </label>
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="false" tabindex="0">
                                                        <input type="radio" name="type" id="type_mirror" value="mirror" hidden="hidden" data-autosubmit="true">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">Mirrors</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </details-menu>
                                    </details>

                                    <details class="details-reset details-overlay position-relative flex-auto" id="language-options">
                                        <summary class="btn" aria-haspopup="menu" role="button">
                                            <i>Language:</i>
                                            <span data-menu-button="">
              All
            </span>
                                            <span class="dropdown-caret"></span>
                                        </summary>

                                        <details-menu class="SelectMenu right-md-0" role="menu">
                                            <div class="SelectMenu-modal">
                                                <header class="SelectMenu-header">
                                                    <span class="SelectMenu-title">Select language</span>
                                                    <button class="SelectMenu-closeButton" type="button" data-toggle-for="language-options"><svg aria-label="Close menu" class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" role="img"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg></button>
                                                </header>
                                                <div class="SelectMenu-list">
                                                    <label class="SelectMenu-item" role="menuitemradio" aria-checked="true" tabindex="0">
                                                        <input type="radio" name="language" id="language_" value="" hidden="hidden" data-autosubmit="true" checked="checked">
                                                        <svg class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                                                        <span class="text-normal" data-menu-button-text="">All</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </details-menu>
                                    </details>

                                </div>
                            </form></div>


                        <div id="user-repositories-list">

                            <ul data-filterable-for="your-repos-filter" data-filterable-type="substring">


                                @foreach($openSources->where('type', 1) as $openSource)
                                <li class="col-12 d-flex width-full py-4 border-bottom public source" itemprop="owns" itemscope="" itemtype="http://schema.org/Code">
                                    <div class="col-10 col-lg-9 d-inline-block">
                                        <div class="d-inline-block mb-1">
                                            <h3 class="wb-break-all">
                                                <a href="https://github.com/{{ $openSource->name }}" itemprop="name codeRepository">
                                                    {{ $openSource->name }}</a>

                                            </h3>


                                        </div>

                                        <div>
                                        </div>


                                        <div class="f6 text-gray mt-2">

        <span class="ml-0 mr-3">
</span>




                                        </div>
                                    </div>

                                    <div class="col-2 col-lg-3 d-flex flex-column flex-justify-around">

                                        <div class="text-right hide-lg hide-md hide-sm hide-xs mt-2">



          <span class="tooltipped tooltipped-s" aria-label="Past year of activity">
            <svg width="155" height="30">
              <defs>
                <linearGradient id="gradient-222252312" x1="0" x2="0" y1="1" y2="0">
                    <stop offset="10%" stop-color="#c6e48b"></stop>
                    <stop offset="33%" stop-color="#7bc96f"></stop>
                    <stop offset="66%" stop-color="#239a3b"></stop>
                    <stop offset="90%" stop-color="#196127"></stop>
                </linearGradient>
                <mask id="sparkline-222252312" x="0" y="0" width="155" height="28">
                  <polyline transform="translate(0, 28) scale(1,-1)" points="0,1 3,1 6,1 9,1 12,1 15,1 18,1 21,1 24,1 27,1 30,1 33,1 36,1 39,1 42,1 45,1 48,1 51,1 54,1 57,1 60,1 63,1 66,2 69,3 72,2 75,1 78,1 81,1 84,1 87,1 90,1 93,1 96,1 99,1 102,1 105,1 108,1 111,1 114,1 117,2 120,1 123,1 126,1 129,1 132,1 135,1 138,1 141,1 144,1 147,1 150,1 153,2 " fill="transparent" stroke="#8cc665" stroke-width="2">
                </polyline></mask>
              </defs>

              <g transform="translate(0, -11)">
                <rect x="0" y="-2" width="155" height="30" style="stroke: none; fill: url(#gradient-222252312); mask: url(#sparkline-222252312)"></rect>
              </g>
            </svg>
          </span>

                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
