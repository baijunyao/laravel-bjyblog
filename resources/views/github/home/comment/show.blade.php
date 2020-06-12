@extends('github.layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')

    <div class="application-main " data-commit-hovercards-enabled="">
        <div itemscope="" itemtype="http://schema.org/SoftwareSourceCode" class="">
            <main id="js-repo-pjax-container" data-pjax-container="">
                <div class="pagehead repohead hx_repohead readability-menu bg-gray-light pb-0 pt-0 pt-lg-3">
                    <div class="d-flex container-lg mb-4 p-responsive d-none d-lg-flex">
                        <div class="flex-auto min-width-0 width-fit mr-3">
                            <h1 class="public  d-flex flex-wrap flex-items-center break-word float-none ">
  <span class="flex-self-stretch" style="margin-top: -2px;">
      <svg class="octicon octicon-repo" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
  </span>
                                <span class="author ml-2 flex-self-stretch" itemprop="author">
    <a class="url fn" rel="author" data-hovercard-type="user" data-hovercard-url="/users/baijunyao/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/baijunyao">baijunyao</a>
  </span>
                                <span class="path-divider flex-self-stretch">/</span>
                                <strong itemprop="name" class="mr-2 flex-self-stretch">
                                    <a data-pjax="#js-repo-pjax-container" href="/baijunyao/laravel-bjyblog">laravel-bjyblog</a>
                                </strong>
                            </h1>
                        </div>

                        <ul class="pagehead-actions flex-shrink-0 ">
                            <li>
                                <a class="tooltipped tooltipped-s btn btn-sm btn-with-count" aria-label="You must be signed in to watch a repository" rel="nofollow" data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;notification subscription menu watch&quot;,&quot;repository_id&quot;:null,&quot;auth_type&quot;:&quot;LOG_IN&quot;,&quot;originating_url&quot;:&quot;https://github.com/baijunyao/laravel-bjyblog/issues&quot;,&quot;user_id&quot;:null}}" data-hydro-click-hmac="9b4a73f3dab84768b20bfe5d094ded3f2cb4b0e60a1551ad15b24f2658984cd4" href="/login?return_to=%2Fbaijunyao%2Flaravel-bjyblog">
                                    <svg class="octicon octicon-eye" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
                                    Watch
                                </a>    <a class="social-count" href="/baijunyao/laravel-bjyblog/watchers" aria-label="29 users are watching this repository">
                                    29
                                </a>
                            </li>

                            <li>
                                <a class="btn btn-sm btn-with-count  tooltipped tooltipped-s" aria-label="You must be signed in to star a repository" rel="nofollow" data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;star button&quot;,&quot;repository_id&quot;:78333414,&quot;auth_type&quot;:&quot;LOG_IN&quot;,&quot;originating_url&quot;:&quot;https://github.com/baijunyao/laravel-bjyblog/issues&quot;,&quot;user_id&quot;:null}}" data-hydro-click-hmac="ed7e45bb349f232dc46d153d2fe10521e0fb657b41e896dc6e670221906776ca" href="/login?return_to=%2Fbaijunyao%2Flaravel-bjyblog">
                                    <svg height="16" class="octicon octicon-star v-align-text-bottom" vertical_align="text_bottom" viewBox="0 0 14 16" version="1.1" width="14" aria-hidden="true"><path fill-rule="evenodd" d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74L14 6z"></path></svg>

                                    Star
                                </a>
                                <a class="social-count js-social-count" href="/baijunyao/laravel-bjyblog/stargazers" aria-label="431 users starred this repository">
                                    431
                                </a>

                            </li>

                            <li>
                                <a class="btn btn-sm btn-with-count tooltipped tooltipped-s" aria-label="You must be signed in to fork a repository" rel="nofollow" data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;repo details fork button&quot;,&quot;repository_id&quot;:78333414,&quot;auth_type&quot;:&quot;LOG_IN&quot;,&quot;originating_url&quot;:&quot;https://github.com/baijunyao/laravel-bjyblog/issues&quot;,&quot;user_id&quot;:null}}" data-hydro-click-hmac="bd48c6405d6d88e540d0cb360a95f507961988dad7b5b777a50c76b3397e7b3e" href="/login?return_to=%2Fbaijunyao%2Flaravel-bjyblog">
                                    <svg class="octicon octicon-repo-forked" viewBox="0 0 10 16" version="1.1" width="10" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8 1a1.993 1.993 0 00-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 002 1a1.993 1.993 0 00-1 3.72V6.5l3 3v1.78A1.993 1.993 0 005 15a1.993 1.993 0 001-3.72V9.5l3-3V4.72A1.993 1.993 0 008 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
                                    Fork
                                </a>
                                <a href="/baijunyao/laravel-bjyblog/network/members" class="social-count" aria-label="178 users forked this repository">
                                    178
                                </a>
                            </li>
                        </ul>
                    </div>

                    <nav class="js-repo-nav js-sidenav-container-pjax clearfix hx_reponav reponav p-responsive d-none d-lg-block container-lg" itemscope="" itemtype="http://schema.org/BreadcrumbList" aria-label="Repository" data-pjax="#js-repo-pjax-container">
                        <ul class="list-style-none">
                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <a class="js-selected-navigation-item reponav-item" itemprop="url" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches repo_packages repo_deployments /baijunyao/laravel-bjyblog" href="/baijunyao/laravel-bjyblog">
                                    <div class="d-inline"><svg class="octicon octicon-code" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"></path></svg></div>
                                    <span itemprop="name">Code</span>
                                    <meta itemprop="position" content="1">
                                </a>    </li>

                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <a itemprop="url" data-hotkey="g i" class="js-selected-navigation-item selected reponav-item" aria-current="page" data-selected-links="repo_issues repo_labels repo_milestones /baijunyao/laravel-bjyblog/issues" href="/baijunyao/laravel-bjyblog/issues">
                                    <div class="d-inline"><svg class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg></div>
                                    <span itemprop="name">Issues</span>
                                    <span class="Counter">{{ $comments->count() }}</span>
                                    <meta itemprop="position" content="2">
                                </a>      </li>

                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <a data-hotkey="g p" data-skip-pjax="true" itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="repo_pulls checks /baijunyao/laravel-bjyblog/pulls" href="/baijunyao/laravel-bjyblog/pulls">
                                    <div class="d-inline"><svg class="octicon octicon-git-pull-request" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0010 15a1.993 1.993 0 001-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 00-1 3.72v6.56A1.993 1.993 0 002 15a1.993 1.993 0 001-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg></div>
                                    <span itemprop="name">Pull requests</span>
                                    <span class="Counter">0</span>
                                    <meta itemprop="position" content="4">
                                </a>    </li>


                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement" class="position-relative float-left ">
                                <a data-hotkey="g w" data-skip-pjax="true" class="js-selected-navigation-item reponav-item" data-selected-links="repo_actions /baijunyao/laravel-bjyblog/actions" href="/baijunyao/laravel-bjyblog/actions">
                                    <div class="d-inline"><svg class="octicon octicon-play" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14 8A7 7 0 110 8a7 7 0 0114 0zm-8.223 3.482l4.599-3.066a.5.5 0 000-.832L5.777 4.518A.5.5 0 005 4.934v6.132a.5.5 0 00.777.416z"></path></svg></div>
                                    Actions
                                </a>
                            </li>

                            <li>
                                <a data-hotkey="g b" class="js-selected-navigation-item reponav-item" data-selected-links="repo_projects new_repo_project repo_project /baijunyao/laravel-bjyblog/projects" href="/baijunyao/laravel-bjyblog/projects">
                                    <div class="d-inline"><svg class="octicon octicon-project" viewBox="0 0 15 16" version="1.1" width="15" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 00-1 1v14a1 1 0 001 1h13a1 1 0 001-1V1a1 1 0 00-1-1z"></path></svg></div>
                                    Projects
                                    <span class="Counter">1</span>
                                </a>      </li>


                            <li>
                                <a data-skip-pjax="true" class="js-selected-navigation-item reponav-item" data-selected-links="security overview alerts policy token_scanning code_scanning /baijunyao/laravel-bjyblog/security" href="/baijunyao/laravel-bjyblog/security">
                                    <div class="d-inline"><svg class="octicon octicon-shield" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M0 2l7-2 7 2v6.02C14 12.69 8.69 16 7 16c-1.69 0-7-3.31-7-7.98V2zm1 .75L7 1l6 1.75v5.268C13 12.104 8.449 15 7 15c-1.449 0-6-2.896-6-6.982V2.75zm1 .75L7 2v12c-1.207 0-5-2.482-5-5.985V3.5z"></path></svg></div>
                                    Security
                                    <span class="Counter js-security-tab-count" data-url="/baijunyao/laravel-bjyblog/security/overall-count">0</span>
                                </a>      </li>

                            <li>
                                <a class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors dependency_graph dependabot_updates pulse people /baijunyao/laravel-bjyblog/pulse" href="/baijunyao/laravel-bjyblog/pulse">
                                    <div class="d-inline"><svg class="octicon octicon-graph" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"></path></svg></div>
                                    Insights
                                </a>      </li>


                        </ul>
                    </nav>

                    <div class="reponav-wrapper reponav-small d-lg-none">
                        <nav class="reponav js-reponav text-center no-wrap" itemscope="" itemtype="http://schema.org/BreadcrumbList">

    <span itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a class="js-selected-navigation-item reponav-item" itemprop="url" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches repo_packages repo_deployments /baijunyao/laravel-bjyblog" href="/baijunyao/laravel-bjyblog">
        <span itemprop="name">Code</span>
        <meta itemprop="position" content="1">
</a>    </span>

                            <span itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
        <a itemprop="url" class="js-selected-navigation-item selected reponav-item" aria-current="page" data-selected-links="repo_issues repo_labels repo_milestones /baijunyao/laravel-bjyblog/issues" href="/baijunyao/laravel-bjyblog/issues">
          <span itemprop="name">Issues</span>
          <span class="Counter">9</span>
          <meta itemprop="position" content="2">
</a>      </span>

                            <span itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="repo_pulls checks /baijunyao/laravel-bjyblog/pulls" href="/baijunyao/laravel-bjyblog/pulls">
        <span itemprop="name">Pull requests</span>
        <span class="Counter">0</span>
        <meta itemprop="position" content="4">
</a>    </span>


                            <span itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
        <a itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="repo_projects new_repo_project repo_project /baijunyao/laravel-bjyblog/projects" href="/baijunyao/laravel-bjyblog/projects">
          <span itemprop="name">Projects</span>
          <span class="Counter">1</span>
          <meta itemprop="position" content="5">
</a>      </span>

                            <span itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
        <a itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="repo_actions /baijunyao/laravel-bjyblog/actions" href="/baijunyao/laravel-bjyblog/actions">
          <span itemprop="name">Actions</span>
          <meta itemprop="position" content="6">
</a>      </span>


                            <a itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="security overview alerts policy token_scanning code_scanning /baijunyao/laravel-bjyblog/security" href="/baijunyao/laravel-bjyblog/security">
                                <span itemprop="name">Security</span>
                                <span class="Counter js-security-deferred-tab-count">0</span>
                                <meta itemprop="position" content="8">
                            </a>
                            <a class="js-selected-navigation-item reponav-item" data-selected-links="pulse /baijunyao/laravel-bjyblog/pulse" href="/baijunyao/laravel-bjyblog/pulse">
                                Pulse
                            </a>

                        </nav>
                    </div>
                </div>

                <include-fragment class="js-notification-shelf-include-fragment" data-base-src="https://github.com/notifications/beta/shelf"></include-fragment>

                <div class="container-lg clearfix new-discussion-timeline  p-responsive">
                    <div class="repository-content ">



                        <div class="js-check-all-container" data-pjax="">


                            <div id="show_issue" class="js-issues-results js-socket-channel js-updatable-content" data-channel="issue:541579911:timeline">


                                <div id="partial-discussion-header" class="gh-header js-details-container Details js-socket-channel js-updatable-content issue" data-channel="issue:541579911" data-url="/baijunyao/laravel-bjyblog/issues/131/show_partial?partial=issues%2Ftitle&amp;sticky=true" data-gid="MDU6SXNzdWU1NDE1Nzk5MTE=">
                                    <div class="gh-header-show ">
                                        <div class="d-flex flex-column flex-md-row">
                                            <div class="gh-header-actions mt-0 mt-md-1 mb-3 mb-md-0 ml-0 flex-md-order-1 flex-shrink-0 d-flex flex-items-start">

                                                <div class="flex-auto text-right d-block d-md-none">
                                                    <a href="#issue-comment-box" class="py-1">Jump to bottom</a>
                                                </div>
                                            </div>

                                            <h1 class="gh-header-title f1 mr-0 flex-auto break-word">
      <span class="js-issue-title">
        {!! $comments->first()->content !!}
      </span>
                                                <span class="gh-header-number">#{{ $comments->first()->id }}</span>
                                            </h1>
                                        </div>
                                    </div>

                                    <div class="TableObject gh-header-meta">
                                        <div class="TableObject-item">
        <span class="State State--green  " title="Status: Open">

  <svg height="16" class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="14" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg> Open

</span>

                                        </div>
                                        <div class="TableObject-item TableObject-item--primary">
                                            <a class="author text-bold link-gray" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk">{{ $comments->first()->socialiteUser->name }}</a>  opened this issue
                                            <relative-time datetime="2019-12-23T05:20:46Z" class="no-wrap" title="Dec 23, 2019, 1:20 PM GMT+8">on {{ $comments->first()->created_at->format('M j, Y') }}</relative-time>
                                            · {{ $comments->count() }} comments

                                            <span data-issue-and-pr-hovercards-enabled="">

</span>

                                        </div>
                                    </div>


                                    <div class="js-sticky-offset-scroll top-0 gh-header-sticky is-placeholder" style="visibility: hidden; display: none; height: 1px;"></div><div class="js-sticky js-sticky-offset-scroll top-0 gh-header-sticky" data-original-top="0px" style="position: static; top: 0px !important; left: 150px; width: 980px;">
                                        <div class="sticky-content">
                                            <div class="d-flex flex-items-center flex-justify-between mt-2">
                                                <div class="d-flex flex-row flex-items-center min-width-0">
                                                    <div class="mr-2 flex-shrink-0">
                <span class="State State--green  " title="Status: Open">

  <svg height="16" class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="14" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg> Open

</span>

                                                    </div>
                                                    <div class="min-width-0">
                                                        <h1 class="d-flex text-bold f5">
                                                            <a class="js-issue-title css-truncate css-truncate-target link-gray-dark width-fit" href="#">提問，請教bjyblog的base url設置方法</a>
                                                            <span class="gh-header-number text-gray-light pl-1">#131</span>
                                                        </h1>

                                                        <div class="meta text-gray-light css-truncate css-truncate-target d-block width-fit">
                                                            <a class="author text-bold link-gray" data-hovercard-z-index-override="111" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk">rfrkk</a>  opened this issue
                                                            <relative-time datetime="2019-12-23T05:20:46Z" class="no-wrap" title="Dec 23, 2019, 1:20 PM GMT+8">on Dec 23, 2019</relative-time>
                                                            · 2 comments

                                                            <span data-issue-and-pr-hovercards-enabled="">

</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gh-header-shadow box-shadow js-notification-shelf-offset-top" data-original-top="auto" style="top: 0px !important;"></div>
                                </div>





                                <h2 class="sr-only">Comments</h2>
                                <div id="discussion_bucket">
                                    <div class="gutter-condensed gutter-lg d-flex flex-column flex-md-row">

                                        <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
                                            <div class="js-quote-selection-container" data-quote-markdown=".js-comment-body" data-issue-and-pr-hovercards-enabled="" data-team-hovercards-enabled="">

                                                <div class="js-discussion js-socket-channel ml-0 pl-0 ml-md-6 pl-md-3" data-channel="marked-as-read:issue:541579911">

                                                    <div class="TimelineItem pt-0 js-comment-container js-socket-channel " data-gid="MDU6SXNzdWU1NDE1Nzk5MTE=" data-url="/_render_node/MDU6SXNzdWU1NDE1Nzk5MTE=/issues/body" data-channel="issue:541579911">


                                                        <div class="avatar-parent-child TimelineItem-avatar d-none d-md-block">
                                                            <a class="d-inline-block" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk"><img class="avatar rounded-1 avatar-user" height="40" width="40" alt="@rfrkk" src="{{ url($comments->first()->socialiteUser->avatar) }}"></a>

                                                        </div>


                                                        <div class="timeline-comment-group js-minimizable-comment-group js-targetable-element TimelineItem-body my-0 " id="issue-541579911">
                                                            <div class="ml-n3 timeline-comment unminimized-comment comment previewable-edit js-task-list-container js-comment timeline-comment--caret " data-body-version="26574d92559c1d28d303b5c92abf3174" data-unfurl-hide-url="/content_reference_attachments/hide">
                                                                <input type="hidden" data-csrf="true" class="js-data-unfurl-hide-url-csrf" value="xt/jPqf6UKyOZ6NipoHMW8Bh1LGDsO+RNOVmkRTUeWJkffsCrnnYTK4U6nybYQ/vhm34PuWv4yGYoEOvTI8SYg==">


                                                                <div class="timeline-comment-header clearfix d-block d-sm-flex">
                                                                    <div class="timeline-comment-actions flex-shrink-0">



















                                                                        <details class="details-overlay details-reset position-relative d-inline-block ">
                                                                            <summary class="btn-link timeline-comment-action link-gray" aria-haspopup="menu" role="button">
                                                                                <svg aria-label="Show options" class="octicon octicon-kebab-horizontal" viewBox="0 0 13 16" version="1.1" width="13" height="16" role="img"><path fill-rule="evenodd" d="M1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm5 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM13 7.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path></svg>
                                                                            </summary>
                                                                            <details-menu class="dropdown-menu dropdown-menu-sw show-more-popover text-gray-dark anim-scale-in" style="width:185px" role="menu">
                                                                                <clipboard-copy class="dropdown-item btn-link" for="issue-541579911-permalink" role="menuitem" tabindex="0">
                                                                                    Copy link
                                                                                </clipboard-copy>

                                                                                <button type="button" class="dropdown-item btn-link d-none js-comment-quote-reply" role="menuitem">
                                                                                    Quote reply
                                                                                </button>


                                                                            </details-menu>
                                                                        </details>

                                                                    </div>


                                                                    <div class="d-none d-sm-flex">






                                                                    </div>

                                                                    <h3 class="timeline-comment-header-text f5 text-normal">


                                                                        <a class="d-inline-block d-md-none" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk"><img class="avatar rounded-1 avatar-user" height="20" width="20" alt="@rfrkk" src="https://avatars1.githubusercontent.com/u/137764?s=60&amp;v=4"></a>

                                                                        <strong class="css-truncate">


                                                                            <a class="author link-gray-dark css-truncate-target width-fit" show_full_name="false" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk">{{ $comments->first()->socialiteUser->name }}</a>


                                                                        </strong>


                                                                        commented


                                                                        <a href="#issue-541579911" id="issue-541579911-permalink" class="link-gray js-timestamp"><relative-time datetime="2019-12-23T05:20:46Z" class="no-wrap" title="Dec 23, 2019, 1:20 PM GMT+8">on {{ $comments->first()->created_at->format('M j, Y') }}</relative-time></a>


                                                                        <span class="js-comment-edit-history">
    </span>
                                                                    </h3>
                                                                </div>


                                                                <div class="edit-comment-hide">


                                                                    <task-lists disabled="" sortable="">
                                                                        <table class="d-block" data-paste-markdown-skip="">
                                                                            <tbody class="d-block">
                                                                            <tr class="d-block">
                                                                                <td class="d-block comment-body markdown-body  js-comment-body">
                                                                                    {!! $comments->first()->content !!}
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </task-lists>




                                                                    <div class="comment-reactions border-top  js-reactions-container">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>




                                                    <div class="js-issue-timeline-container">
                                                        <div id="js-timeline-progressive-loader" data-timeline-item-src="baijunyao/laravel-bjyblog/timeline?id=MDU6SXNzdWU1NDE1Nzk5MTE%3D&amp;variables%5Bafter%5D=Y3Vyc29yOnYyOpPPAAABbzVKzCAAqTU2ODYxMjcxMw%3D%3D&amp;variables%5Bfirst%5D=60"></div>

                                                        @foreach($comments->toBase()->splice(1) as $comment)
                                                            <div class="js-timeline-item js-timeline-progressive-focus-container" data-gid="MDEyOklzc3VlQ29tbWVudDU2ODM2MTcxNQ==">


                                                            <div class="TimelineItem js-comment-container" data-gid="MDEyOklzc3VlQ29tbWVudDU2ODM2MTcxNQ==" data-url="/_render_node/MDEyOklzc3VlQ29tbWVudDU2ODM2MTcxNQ==/timeline/issue_comment">


                                                                <div class="avatar-parent-child TimelineItem-avatar d-none d-md-block">
                                                                    <a class="d-inline-block" data-hovercard-type="user" data-hovercard-url="/users/baijunyao/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/baijunyao"><img class="avatar rounded-1 avatar-user" height="40" width="40" alt="@baijunyao" src="{{ url($comment->socialiteUser->avatar) }}"></a>

                                                                </div>


                                                                <div class="timeline-comment-group js-minimizable-comment-group js-targetable-element TimelineItem-body my-0 " id="issuecomment-568361715">
                                                                    <div class="ml-n3 timeline-comment unminimized-comment comment previewable-edit js-task-list-container js-comment timeline-comment--caret " data-body-version="58359b5a1e75cb21e068eb5694c4054c" data-unfurl-hide-url="/content_reference_attachments/hide">
                                                                        <input type="hidden" data-csrf="true" class="js-data-unfurl-hide-url-csrf" value="V6JRG4XKpJjbsOWPiycqjShhY10jW4eDBNH9TRC4Afn1AEknjEksePvDrJG2x+k5bm1P0kVEizOolNhzSONq+Q==">


                                                                        <div class="timeline-comment-header clearfix d-block d-sm-flex">
                                                                            <div class="timeline-comment-actions flex-shrink-0">



















                                                                                <details class="details-overlay details-reset position-relative d-inline-block ">
                                                                                    <summary class="btn-link timeline-comment-action link-gray" aria-haspopup="menu" role="button">
                                                                                        <svg aria-label="Show options" class="octicon octicon-kebab-horizontal" viewBox="0 0 13 16" version="1.1" width="13" height="16" role="img"><path fill-rule="evenodd" d="M1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm5 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM13 7.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path></svg>
                                                                                    </summary>
                                                                                    <details-menu class="dropdown-menu dropdown-menu-sw show-more-popover text-gray-dark anim-scale-in" style="width:185px" role="menu">
                                                                                        <clipboard-copy class="dropdown-item btn-link" for="issuecomment-568361715-permalink" role="menuitem" tabindex="0">
                                                                                            Copy link
                                                                                        </clipboard-copy>

                                                                                        <button type="button" class="dropdown-item btn-link d-none js-comment-quote-reply" role="menuitem">
                                                                                            Quote reply
                                                                                        </button>


                                                                                    </details-menu>
                                                                                </details>

                                                                            </div>


                                                                            <div class="d-none d-sm-flex">


                                                                                @if($comment->socialiteUser->is_admin)
    <span class="timeline-comment-label text-bold tooltipped tooltipped-multiline tooltipped-s" aria-label="This user is the owner of the laravel-bjyblog repository.">
      Owner
    </span>
                                                                                    @endif




                                                                            </div>

                                                                            <h3 class="timeline-comment-header-text f5 text-normal">


                                                                                <a class="d-inline-block d-md-none" data-hovercard-type="user" data-hovercard-url="/users/baijunyao/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/baijunyao"><img class="avatar rounded-1 avatar-user" height="20" width="20" alt="@baijunyao" src="https://avatars0.githubusercontent.com/u/9360694?s=60&amp;u=7c4503ac0541f894741d32bc1d7cbddd811b5b0e&amp;v=4"></a>

                                                                                <strong class="css-truncate">


                                                                                    <a class="author link-gray-dark css-truncate-target width-fit" show_full_name="false" data-hovercard-type="user" data-hovercard-url="/users/baijunyao/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/baijunyao">{{ $comment->socialiteUser->name }}</a>


                                                                                </strong>


                                                                                commented


                                                                                <a href="#issuecomment-568361715" id="issuecomment-568361715-permalink" class="link-gray js-timestamp"><relative-time datetime="2019-12-23T05:34:30Z" class="no-wrap" title="Dec 23, 2019, 1:34 PM GMT+8">on {{ $comment->created_at->format('M j, Y') }}</relative-time></a>


                                                                                <span class="js-comment-edit-history">

  <span class="d-inline-block text-gray-light">•</span>

  <details class="details-overlay details-reset d-inline-block dropdown hx_dropdown-fullscreen">
    <summary class="btn-link no-underline text-gray js-notice" aria-haspopup="menu" role="button">
      <div class="position-relative">
        <span>
            edited
        </span>
        <svg height="11" class="octicon octicon-triangle-down v-align-middle" viewBox="0 0 12 16" version="1.1" width="8" aria-hidden="true"><path fill-rule="evenodd" d="M0 5l6 6 6-6H0z"></path></svg>
      </div>
    </summary>
    <details-menu class="dropdown-menu dropdown-menu-s width-auto py-0 js-comment-edit-history-menu" style="max-width: 352px; z-index: 99;" src="/_render_node/MDEyOklzc3VlQ29tbWVudDU2ODM2MTcxNQ==/comments/comment_edit_history_log" preload="" role="menu">
      <include-fragment class="octocat-spinner my-3" style="min-width: 100px;" aria-label="Loading"></include-fragment>
    </details-menu>
  </details>

    </span>
                                                                            </h3>
                                                                        </div>


                                                                        <div class="edit-comment-hide">


                                                                            <task-lists disabled="" sortable="">
                                                                                <table class="d-block" data-paste-markdown-skip="">
                                                                                    <tbody class="d-block">
                                                                                    <tr class="d-block">

                                                                                        <td class="d-block comment-body markdown-body  js-comment-body">
                                                                                            {!! $comment->content !!}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </task-lists>


                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>


                                                        </div>
                                                        @endforeach

                                                        <!-- Rendered timeline since 2019-12-23 16:24:52 -->
                                                        <div class="js-timeline-marker js-socket-channel js-updatable-content" id="partial-timeline" data-channel="issue:541579911" data-url="/_render_node/MDU6SXNzdWU1NDE1Nzk5MTE=/issues/unread_timeline?variables%5BhasFocusedReviewComment%5D=false&amp;variables%5BhasFocusedReviewThread%5D=false&amp;variables%5BsyntaxHighlightingEnabled%5D=true&amp;variables%5BtimelinePageSize%5D=30&amp;variables%5BtimelineSince%5D=2019-12-24T00%3A24%3A52Z" data-last-modified="Tue, 24 Dec 2019 00:24:52 GMT" data-gid="MDU6SXNzdWU1NDE1Nzk5MTE=">
                                                            <!-- '"` --><!-- </textarea></xmp> --><form class="d-none js-timeline-marker-form" action="/_graphql/MarkNotificationSubjectAsRead" accept-charset="UTF-8" data-remote="true" method="post"><input type="hidden" data-csrf="true" name="authenticity_token" value="5TpmvIqFE5JmV7WNmrK2jt3Tib89YrZWScIk3EzXRmM+IDWnpJO3TJzuySXEhxgT2hnlR582VfSX3inKE3EqBg==">
                                                                <input type="hidden" name="variables[subjectId]" value="MDU6SXNzdWU1NDE1Nzk5MTE=">
                                                            </form>  </div>

                                                    </div>


                                                </div>


                                                <span id="issue-comment-box"></span>
                                                <div class="discussion-timeline-actions">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="flex-shrink-0 col-12 col-md-3">

                                            <div id="partial-discussion-sidebar" class="js-socket-channel js-updatable-content" data-channel="issue:541579911" data-gid="MDU6SXNzdWU1NDE1Nzk5MTE=" data-url="/baijunyao/laravel-bjyblog/issues/131/show_partial?partial=issues%2Fsidebar" data-project-hovercards-enabled="">


                                                <div class="discussion-sidebar-item sidebar-assignee js-discussion-sidebar-item">
                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select assignees" action="/baijunyao/laravel-bjyblog/issues/131/assignees" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" data-csrf="true" name="authenticity_token" value="/+JwiTSjtcOjMsWIjOYFRCnbL3q9FeZ6NE1xDzTxrTDICuz3bcUgb11yUMzysGd33vXH19ePXvg0UBNt5sYAZw==">

                                                        <div class="discussion-sidebar-heading text-bold">
                                                            Assignees
                                                        </div>


                                                        <span class="css-truncate js-issue-assignees">
    No one assigned
</span>

                                                    </form></div>

                                                <div class="discussion-sidebar-item sidebar-labels js-discussion-sidebar-item">



                                                    <div class="discussion-sidebar-heading text-bold">
                                                        Labels
                                                    </div>

                                                    <div class="labels css-truncate js-issue-labels">
                                                        None yet
                                                    </div>

                                                </div>


                                                <div class="discussion-sidebar-item js-discussion-sidebar-item">
                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select projects" action="/baijunyao/laravel-bjyblog/projects/issues/131" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" data-csrf="true" name="authenticity_token" value="8HIce4Uvilaw6woynLwzoMijcGHg6W4UYtquyeKqY2atiH9Tv+gqCLLKRrLk/8aIhL6KOZOGO8iNaCqv2CYq7A==">

                                                        <div class="discussion-sidebar-heading text-bold">
                                                            Projects
                                                        </div>


                                                        <span class="css-truncate sidebar-progress-bar">
    None yet
</span>

                                                    </form></div>

                                                <div class="discussion-sidebar-item sidebar-progress-bar js-discussion-sidebar-item">
                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select milestones" action="/baijunyao/laravel-bjyblog/issues/131/set_milestone?partial=issues%2Fsidebar%2Fshow%2Fmilestone" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" data-csrf="true" name="authenticity_token" value="db2Al1SI2VkWzjpyGQfHl5iYruu8fvnv8+3c++9+M67pTByodgSn4lYEGL1xQe1MhdK1W2iL8ByfFhXEtP3DAg==">

                                                        <div class="discussion-sidebar-heading text-bold">
                                                            Milestone
                                                        </div>

                                                        No milestone

                                                    </form></div>


                                                <div class="discussion-sidebar-item js-discussion-sidebar-item" data-issue-and-pr-hovercards-enabled="">
                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Link issues" action="/baijunyao/laravel-bjyblog/issues/closing_references?source_id=541579911&amp;source_type=ISSUE" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" data-csrf="true" name="authenticity_token" value="7uzusB3HJt9dLeYv1X6bI2bMZF9+d5HV7O9/y9SqQ1kcoKwH2Otm14942hndLQPhmgxY7OS+9RKCW+Pr6QRW5w==">

                                                        <div class="discussion-sidebar-heading text-bold">
                                                            Linked pull requests
                                                        </div>



                                                        <p>Successfully merging a pull request may close this issue.</p>

                                                        None yet

                                                    </form>
                                                </div>


                                                <div id="partial-users-participants" class="discussion-sidebar-item">
                                                    <div class="participation">

                                                        <div class="discussion-sidebar-heading text-bold">
                                                            {{ $comments->groupBy('socialite_user_id')->count() }} participants
                                                        </div>
                                                        <div class="participation-avatars d-flex flex-wrap">
                                                            @foreach($comments->groupBy('socialite_user_id') as $comments)
                                                                <a class="participant-avatar" data-hovercard-type="user" data-hovercard-url="/users/rfrkk/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/rfrkk">
                                                                    <img class="avatar avatar-user" src="{{ url($comments->first()->socialiteUser->avatar) }}" width="26" height="26" alt="@rfrkk">
                                                                </a>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

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
    </div>

@endsection
