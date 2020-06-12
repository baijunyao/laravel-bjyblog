<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ config('bjyblog.head.title') }} @endif</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/github/github-6c564594311e54614a4a1f0d0f37b543.css') }}">
    <link rel="stylesheet" href="{{ url('css/github/frameworks-146fab5ea30e8afac08dd11013bb4ee0.css') }}">
    @yield('css')
</head>
<body class="logged-out env-production page-responsive page-profile intent-mouse">

<div class="position-relative js-header-wrapper ">
        <span class="Progress progress-pjax-loader position-fixed width-full js-pjax-loader-bar">
            <span class="progress-pjax-loader-bar top-0 left-0" style="width: 0%;"></span>
        </span>

    <header class="Header-old header-logged-out js-details-container Details position-relative f4 py-2" role="banner">
        <div class="container-xl d-lg-flex flex-items-center p-responsive">
            <div class="d-flex flex-justify-between flex-items-center">
                <a class="mr-4" href="https://github.com/baijunyao" aria-label="Homepage"
                   data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
                    <svg height="32" class="octicon octicon-mark-github text-white" viewBox="0 0 16 16" version="1.1"
                         width="32" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                    </svg>
                </a>

                <div class="d-lg-none css-truncate css-truncate-target width-fit p-2"></div>
                <div class="d-flex flex-items-center">
                    <button class="btn-link d-lg-none mt-1 js-details-target" type="button"
                            aria-label="Toggle navigation" aria-expanded="false">
                        <svg height="24" class="octicon octicon-three-bars text-white" viewBox="0 0 12 16" version="1.1"
                             width="18" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M11.41 9H.59C0 9 0 8.59 0 8c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zm0-4H.59C0 5 0 4.59 0 4c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zM.59 11H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1H.59C0 13 0 12.59 0 12c0-.59 0-1 .59-1z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="HeaderMenu HeaderMenu--logged-out position-fixed top-0 right-0 bottom-0 height-fit position-lg-relative d-lg-flex flex-justify-between flex-items-center flex-auto">
                <div class="d-flex d-lg-none flex-justify-end border-bottom bg-gray-light p-3">
                    <button class="btn-link js-details-target" type="button" aria-label="Toggle navigation"
                            aria-expanded="false">
                        <svg height="24" class="octicon octicon-x text-gray" viewBox="0 0 12 16" version="1.1"
                             width="18" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                        </svg>
                    </button>
                </div>

                <nav class="mt-0 px-3 px-lg-0 mb-5 mb-lg-0" aria-label="Global">
                    <ul class="d-lg-flex list-style-none">

                    </ul>
                </nav>

                <div class="d-lg-flex flex-items-center px-3 px-lg-0 text-center text-lg-left">
                    <div class="d-lg-flex mb-3 mb-lg-0">
                        <div
                            class="header-search flex-self-stretch flex-lg-self-auto mr-0 mr-lg-3 mb-3 mb-lg-0 scoped-search site-scoped-search js-site-search position-relative js-jump-to"
                            role="combobox" aria-owns="jump-to-results" aria-label="Search or jump to"
                            aria-haspopup="listbox" aria-expanded="false">
                            <div class="position-relative">
                                <!-- '"` --><!-- </textarea></xmp> -->
                                <form class="js-site-search-form" role="search" aria-label="Site" data-scope-type="User"
                                      data-scope-id="9360694" data-scoped-search-url="/search?user=baijunyao"
                                      data-unscoped-search-url="/search" action="/search?user=baijunyao"
                                      accept-charset="UTF-8" method="get">
                                    <label
                                        class="form-control input-sm header-search-wrapper p-0 header-search-wrapper-jump-to position-relative d-flex flex-justify-between flex-items-center js-chromeless-input-container">
                                        <input type="text"
                                               class="form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus js-site-search-field is-clearable"
                                               data-hotkey="s,/" name="q" value="" placeholder="Search"
                                               data-unscoped-placeholder="Search GitHub"
                                               data-scoped-placeholder="Search" autocapitalize="off"
                                               aria-autocomplete="list" aria-controls="jump-to-results"
                                               aria-label="Search"
                                               data-jump-to-suggestions-path="/_graphql/GetSuggestedNavigationDestinations"
                                               spellcheck="false" autocomplete="off">
                                        <input type="hidden" data-csrf="true"
                                               class="js-data-jump-to-suggestions-path-csrf"
                                               value="ceggAvKjFcrJ5THkQsdoubdgkCveowbu8mBXGeME+tDlpTkpND9iFPpuvzsx2GBQwU49QTwewLkHFIQSH9v7kA==">
                                        <input type="hidden" class="js-site-search-type-field" name="type">
                                        <img src="https://github.githubassets.com/images/search-key-slash.svg" alt=""
                                             class="mr-2 header-search-key-slash">

                                        <div
                                            class="Box position-absolute overflow-hidden d-none jump-to-suggestions js-jump-to-suggestions-container">

                                            <ul class="d-none js-jump-to-suggestions-template-container">


                                                <li class="d-flex flex-justify-start flex-items-center p-0 f5 navigation-item js-navigation-item js-jump-to-suggestion"
                                                    role="option">
                                                    <a tabindex="-1"
                                                       class="no-underline d-flex flex-auto flex-items-center jump-to-suggestions-path js-jump-to-suggestion-path js-navigation-open p-2"
                                                       href="">
                                                        <div
                                                            class="jump-to-octicon js-jump-to-octicon flex-shrink-0 mr-2 text-center d-none">
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-repo flex-shrink-0 js-jump-to-octicon-repo d-none"
                                                                 title="Repository" aria-label="Repository"
                                                                 viewBox="0 0 12 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-project flex-shrink-0 js-jump-to-octicon-project d-none"
                                                                 title="Project" aria-label="Project"
                                                                 viewBox="0 0 15 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 00-1 1v14a1 1 0 001 1h13a1 1 0 001-1V1a1 1 0 00-1-1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-search flex-shrink-0 js-jump-to-octicon-search d-none"
                                                                 title="Search" aria-label="Search" viewBox="0 0 16 16"
                                                                 version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0013 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 000-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"></path>
                                                            </svg>
                                                        </div>

                                                        <img
                                                            class="avatar mr-2 flex-shrink-0 js-jump-to-suggestion-avatar d-none"
                                                            alt="" aria-label="Team" src="" width="28" height="28">

                                                        <div
                                                            class="jump-to-suggestion-name js-jump-to-suggestion-name flex-auto overflow-hidden text-left no-wrap css-truncate css-truncate-target">
                                                        </div>

                                                        <div
                                                            class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none js-jump-to-badge-search">
<span class="js-jump-to-badge-search-text-default d-none" aria-label="in this user">
    In this user
</span>
                                                            <span class="js-jump-to-badge-search-text-global d-none"
                                                                  aria-label="in all of GitHub">
All GitHub
</span>
                                                            <span aria-hidden="true"
                                                                  class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>

                                                        <div aria-hidden="true"
                                                             class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none d-on-nav-focus js-jump-to-badge-jump">
                                                            Jump to
                                                            <span class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>

                                            <ul class="d-none js-jump-to-no-results-template-container">
                                                <li class="d-flex flex-justify-center flex-items-center f5 d-none js-jump-to-suggestion p-2">
                                                    <span class="text-gray">No suggested jump to results</span>
                                                </li>
                                            </ul>

                                            <ul id="jump-to-results" role="listbox"
                                                class="p-0 m-0 js-navigation-container jump-to-suggestions-results-container js-jump-to-suggestions-results-container">


                                                <li class="d-flex flex-justify-start flex-items-center p-0 f5 navigation-item js-navigation-item js-jump-to-scoped-search d-none"
                                                    role="option">
                                                    <a tabindex="-1"
                                                       class="no-underline d-flex flex-auto flex-items-center jump-to-suggestions-path js-jump-to-suggestion-path js-navigation-open p-2"
                                                       href="">
                                                        <div
                                                            class="jump-to-octicon js-jump-to-octicon flex-shrink-0 mr-2 text-center d-none">
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-repo flex-shrink-0 js-jump-to-octicon-repo d-none"
                                                                 title="Repository" aria-label="Repository"
                                                                 viewBox="0 0 12 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-project flex-shrink-0 js-jump-to-octicon-project d-none"
                                                                 title="Project" aria-label="Project"
                                                                 viewBox="0 0 15 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 00-1 1v14a1 1 0 001 1h13a1 1 0 001-1V1a1 1 0 00-1-1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-search flex-shrink-0 js-jump-to-octicon-search d-none"
                                                                 title="Search" aria-label="Search" viewBox="0 0 16 16"
                                                                 version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0013 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 000-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"></path>
                                                            </svg>
                                                        </div>

                                                        <img
                                                            class="avatar mr-2 flex-shrink-0 js-jump-to-suggestion-avatar d-none"
                                                            alt="" aria-label="Team" src="" width="28" height="28">

                                                        <div
                                                            class="jump-to-suggestion-name js-jump-to-suggestion-name flex-auto overflow-hidden text-left no-wrap css-truncate css-truncate-target">
                                                        </div>

                                                        <div
                                                            class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none js-jump-to-badge-search">
<span class="js-jump-to-badge-search-text-default d-none" aria-label="in this user">
    In this user
</span>
                                                            <span class="js-jump-to-badge-search-text-global d-none"
                                                                  aria-label="in all of GitHub">
All GitHub
</span>
                                                            <span aria-hidden="true"
                                                                  class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>

                                                        <div aria-hidden="true"
                                                             class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none d-on-nav-focus js-jump-to-badge-jump">
                                                            Jump to
                                                            <span class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class="d-flex flex-justify-start flex-items-center p-0 f5 navigation-item js-navigation-item js-jump-to-global-search d-none"
                                                    role="option">
                                                    <a tabindex="-1"
                                                       class="no-underline d-flex flex-auto flex-items-center jump-to-suggestions-path js-jump-to-suggestion-path js-navigation-open p-2"
                                                       href="">
                                                        <div
                                                            class="jump-to-octicon js-jump-to-octicon flex-shrink-0 mr-2 text-center d-none">
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-repo flex-shrink-0 js-jump-to-octicon-repo d-none"
                                                                 title="Repository" aria-label="Repository"
                                                                 viewBox="0 0 12 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-project flex-shrink-0 js-jump-to-octicon-project d-none"
                                                                 title="Project" aria-label="Project"
                                                                 viewBox="0 0 15 16" version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 00-1 1v14a1 1 0 001 1h13a1 1 0 001-1V1a1 1 0 00-1-1z"></path>
                                                            </svg>
                                                            <svg height="16" width="16"
                                                                 class="octicon octicon-search flex-shrink-0 js-jump-to-octicon-search d-none"
                                                                 title="Search" aria-label="Search" viewBox="0 0 16 16"
                                                                 version="1.1" role="img">
                                                                <path fill-rule="evenodd"
                                                                      d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0013 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 000-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"></path>
                                                            </svg>
                                                        </div>

                                                        <img
                                                            class="avatar mr-2 flex-shrink-0 js-jump-to-suggestion-avatar d-none"
                                                            alt="" aria-label="Team" src="" width="28" height="28">

                                                        <div
                                                            class="jump-to-suggestion-name js-jump-to-suggestion-name flex-auto overflow-hidden text-left no-wrap css-truncate css-truncate-target">
                                                        </div>

                                                        <div
                                                            class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none js-jump-to-badge-search">
<span class="js-jump-to-badge-search-text-default d-none" aria-label="in this user">
    In this user
</span>
                                                            <span class="js-jump-to-badge-search-text-global d-none"
                                                                  aria-label="in all of GitHub">
All GitHub
</span>
                                                            <span aria-hidden="true"
                                                                  class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>

                                                        <div aria-hidden="true"
                                                             class="border rounded-1 flex-shrink-0 bg-gray px-1 text-gray-light ml-1 f6 d-none d-on-nav-focus js-jump-to-badge-jump">
                                                            Jump to
                                                            <span class="d-inline-block ml-1 v-align-middle">↵</span>
                                                        </div>
                                                    </a>
                                                </li>


                                            </ul>

                                        </div>
                                    </label>
                                </form>
                            </div>
                        </div>

                    </div>

                    <a href="/login?return_to=%2Fbaijunyao" class="HeaderMenu-link no-underline mr-3"
                       data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;site header menu&quot;,&quot;repository_id&quot;:null,&quot;auth_type&quot;:&quot;SIGN_UP&quot;,&quot;originating_url&quot;:&quot;https://github.com/baijunyao&quot;,&quot;user_id&quot;:null}}"
                       data-hydro-click-hmac="d6903daeab62de7a205b67fa242574453251f424e03babe9127f4c323e7ffa0c"
                       data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in">
                        Sign&nbsp;in
                    </a>
                </div>
            </div>
        </div>
    </header>

</div>
<div id="start-of-content" class="show-on-focus"></div>
<div id="js-flash-container">
    <template class="js-flash-template">
        <div class="flash flash-full  js-flash-template-container">
            <div class=" px-2">
                <button class="flash-close js-flash-close" type="button" aria-label="Dismiss this message">
                    <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                    </svg>
                </button>
                <div class="js-flash-template-message"></div>
            </div>
        </div>
    </template>
</div>

@yield('content')

<div class="footer container-xl width-full p-responsive" role="contentinfo">
    <div
        class="position-relative d-flex flex-row-reverse flex-lg-row flex-wrap flex-lg-nowrap flex-justify-center flex-lg-justify-between pt-6 pb-2 mt-6 f6 text-gray border-top border-gray-light ">
        <ul class="list-style-none d-flex flex-wrap col-12 col-lg-5 flex-justify-center flex-lg-justify-between mb-2 mb-lg-0">
            <li class="mr-3 mr-lg-0">© 2020 GitHub, Inc.</li>
            <li class="mr-3 mr-lg-0"><a data-ga-click="Footer, go to terms, text:terms"
                                        href="">Terms</a></li>
            <li class="mr-3 mr-lg-0"><a data-ga-click="Footer, go to privacy, text:privacy"
                                        href="">Privacy</a></li>
            <li class="mr-3 mr-lg-0"><a data-ga-click="Footer, go to security, text:security"
                                        href="">Security</a></li>
            <li class="mr-3 mr-lg-0"><a href=""
                                        data-ga-click="Footer, go to status, text:status">Status</a></li>
            <li><a data-ga-click="Footer, go to help, text:help" href="">Help</a></li>

        </ul>

        <a aria-label="Homepage" title="GitHub" class="footer-octicon d-none d-lg-block mx-lg-4"
           href="https://github.com">
            <svg height="24" class="octicon octicon-mark-github" viewBox="0 0 16 16" version="1.1" width="24"
                 aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
        </a>
        <ul class="list-style-none d-flex flex-wrap col-12 col-lg-5 flex-justify-center flex-lg-justify-between mb-2 mb-lg-0">
            <li class="mr-3 mr-lg-0"><a data-ga-click="Footer, go to contact, text:contact"
                                        href="">Contact GitHub</a></li>
            <li class="mr-3 mr-lg-0"><a href=""
                                        data-ga-click="Footer, go to Pricing, text:Pricing">Pricing</a></li>
            <li class="mr-3 mr-lg-0"><a href="" data-ga-click="Footer, go to api, text:api">API</a>
            </li>
            <li class="mr-3 mr-lg-0"><a href=""
                                        data-ga-click="Footer, go to training, text:training">Training</a></li>
            <li class="mr-3 mr-lg-0"><a href=""
                                        data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
            <li><a data-ga-click="Footer, go to about, text:about" href="">About</a></li>
        </ul>
    </div>
    <div class="d-flex flex-justify-center pb-6">
        <span class="f6 text-gray-light"></span>
    </div>
</div>

<script type="application/javascript" id="js-conditional-compat" data-src="{{url('js/github/compat-bootstrap-59c4264f.js')}}"></script>
<script type="application/javascript" src="{{url('js/github/environment-bootstrap-41bed71d.js')}}"></script>
<script type="application/javascript" src="{{url('js/github/vendor-0123205f.js')}}"></script>
<script type="application/javascript" src="{{url('js/github/frameworks-24ce19fe.js')}}"></script>
<script type="application/javascript" src="{{url('js/github/github-bootstrap-3def280e.js')}}"></script>

@yield('js')
</body>
</html>
