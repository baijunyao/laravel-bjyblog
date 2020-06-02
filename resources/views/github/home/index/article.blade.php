@extends('github.layouts.home')

@section('title', $article->title)

@section('keywords', $article->keywords)

@section('description', $article->description)

@section('content')

    <div class="application-main " data-commit-hovercards-enabled="">
        <div itemscope="" itemtype="http://schema.org/SoftwareSourceCode" class="">
            <main id="js-repo-pjax-container" data-pjax-container="">
                <div class="pagehead repohead hx_repohead readability-menu bg-gray-light pb-0 pt-3">
                    <div class="d-flex container-lg mb-4 px-3">
                        <div class="flex-auto min-width-0 width-fit mr-3">
                            <h1 class="public  d-flex flex-wrap flex-items-center break-word float-none ">
                                <span class="flex-self-stretch" style="margin-top: -2px;">
                                    <svg class="octicon octicon-repo" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
  </span>
                                    <span class="author ml-2 flex-self-stretch" itemprop="author">
                                        <a class="url fn" rel="author"href="{{ $article->category->url }}">{{ $article->category->name }}</a>
                                    </span>
                                    <span class="path-divider flex-self-stretch">/</span>
                                    <strong itemprop="name" class="mr-2 flex-self-stretch">
                                        <a data-pjax="#js-repo-pjax-container" href="{{ $article->url }}">{{ $article->title }}</a>
                                    </strong>
                            </h1>
                        </div>
                        <ul class="pagehead-actions flex-shrink-0 ">
                            <li>
                                <a class="tooltipped tooltipped-s btn btn-sm btn-with-count" rel="nofollow">
                                    <svg class="octicon octicon-eye v-align-text-bottom" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
                                    Watch
                                </a>    <a class="social-count" href="/baijunyao/laravel-bjyblog/watchers" aria-label="29 users are watching this repository">
                                    {{ $article->views }}
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-sm btn-with-count tooltipped tooltipped-s" rel="nofollow" href="/login?return_to=%2Fbaijunyao%2Flaravel-bjyblog">
                                    <svg height="16" class="octicon octicon-star v-align-text-bottom" vertical_align="text_bottom" viewBox="0 0 14 16" version="1.1" width="14" aria-hidden="true"><path fill-rule="evenodd" d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74L14 6z"></path></svg>
                                    Star
                                </a>
                                <a class="social-count js-social-count" href="/baijunyao/laravel-bjyblog/stargazers" aria-label="431 users starred this repository">
                                    {{ $likes->count() }}
                                </a>
                            </li>

                            <li>
                                <a class="btn btn-sm btn-with-count tooltipped tooltipped-s"rel="nofollow" href="/login?return_to=%2Fbaijunyao%2Flaravel-bjyblog">
                                    <svg class="octicon octicon-repo-forked v-align-text-bottom" viewBox="0 0 10 16" version="1.1" width="10" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8 1a1.993 1.993 0 00-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 002 1a1.993 1.993 0 00-1 3.72V6.5l3 3v1.78A1.993 1.993 0 005 15a1.993 1.993 0 001-3.72V9.5l3-3V4.72A1.993 1.993 0 008 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
                                    Fork
                                </a>
                                <a href="/baijunyao/laravel-bjyblog/network/members" class="social-count" aria-label="177 users forked this repository">
                                    {{ $comments->count() }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <nav class="js-repo-nav js-sidenav-container-pjax clearfix hx_reponav reponav px-3 container-lg" itemscope="" itemtype="http://schema.org/BreadcrumbList" aria-label="Repository" data-pjax="#js-repo-pjax-container">
                        <ul class="list-style-none">
                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <a class="js-selected-navigation-item selected reponav-item" itemprop="url" data-hotkey="g c" aria-current="page" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches repo_packages repo_deployments /baijunyao/laravel-bjyblog" href="/baijunyao/laravel-bjyblog">
                                    <div class="d-inline"><svg class="octicon octicon-code" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"></path></svg></div>
                                    <span itemprop="name">Code</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </li>

                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <a itemprop="url" data-hotkey="g i" class="js-selected-navigation-item reponav-item" data-selected-links="repo_issues repo_labels repo_milestones /baijunyao/laravel-bjyblog/issues" href="{{ route('home.article.comment.index', $article->id) }}">
                                    <div class="d-inline"><svg class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg></div>
                                    <span itemprop="name">Issues</span>
                                    <span class="Counter">{{ count($comments) }}</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </li>

                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                                <span data-hotkey="g p" data-skip-pjax="true" itemprop="url" class="js-selected-navigation-item reponav-item" data-selected-links="repo_pulls checks /baijunyao/laravel-bjyblog/pulls" href="/baijunyao/laravel-bjyblog/pulls">
                                    <div class="d-inline"><svg class="octicon octicon-git-pull-request" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0010 15a1.993 1.993 0 001-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 00-1 3.72v6.56A1.993 1.993 0 002 15a1.993 1.993 0 001-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg></div>
                                    <span itemprop="name">Pull requests</span>
                                    <span class="Counter">0</span>
                                    <meta itemprop="position" content="4">
                                </span>
                            </li>

                            <li itemscope="" itemtype="http://schema.org/ListItem" itemprop="itemListElement" class="position-relative float-left ">
                                <span data-hotkey="g w" data-skip-pjax="true" class="js-selected-navigation-item reponav-item" data-selected-links="repo_actions /baijunyao/laravel-bjyblog/actions" href="/baijunyao/laravel-bjyblog/actions">
                                    <div class="d-inline"><svg class="octicon octicon-play" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14 8A7 7 0 110 8a7 7 0 0114 0zm-8.223 3.482l4.599-3.066a.5.5 0 000-.832L5.777 4.518A.5.5 0 005 4.934v6.132a.5.5 0 00.777.416z"></path></svg></div>
                                    Actions
                                </span>
                            </li>

                            <li>
                                <span data-hotkey="g b" class="js-selected-navigation-item reponav-item" data-selected-links="repo_projects new_repo_project repo_project /baijunyao/laravel-bjyblog/projects" href="/baijunyao/laravel-bjyblog/projects">
                                    <div class="d-inline"><svg class="octicon octicon-project" viewBox="0 0 15 16" version="1.1" width="15" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 00-1 1v14a1 1 0 001 1h13a1 1 0 001-1V1a1 1 0 00-1-1z"></path></svg></div>
                                    Projects
                                    <span class="Counter">0</span>
                                </span>
                            </li>

                            <li>
                                <span data-skip-pjax="true" class="js-selected-navigation-item reponav-item" data-selected-links="security overview alerts policy token_scanning code_scanning /baijunyao/laravel-bjyblog/security" href="/baijunyao/laravel-bjyblog/security">
                                    <div class="d-inline"><svg class="octicon octicon-shield" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M0 2l7-2 7 2v6.02C14 12.69 8.69 16 7 16c-1.69 0-7-3.31-7-7.98V2zm1 .75L7 1l6 1.75v5.268C13 12.104 8.449 15 7 15c-1.449 0-6-2.896-6-6.982V2.75zm1 .75L7 2v12c-1.207 0-5-2.482-5-5.985V3.5z"></path></svg></div>
                                    Security
                                    <span class="Counter js-security-tab-count" data-url="/baijunyao/laravel-bjyblog/security/overall-count">0</span>
                                </span>
                            </li>
                            <li>
                                <span class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors dependency_graph dependabot_updates pulse people /baijunyao/laravel-bjyblog/pulse" href="/baijunyao/laravel-bjyblog/pulse">
                                    <div class="d-inline"><svg class="octicon octicon-graph" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"></path></svg></div>
                                    Insights
                                </span>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="container-lg clearfix new-discussion-timeline  px-3">
                    <div class="repository-content ">
                        <div class="repository-topics-container mt-2 mb-3 js-topics-list-container">
                            <div class="list-topics-container f6">
                                @foreach($article->tags as $tag)
                                    <a class="topic-tag topic-tag-link " href="{{ $tag->url }}">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div id="readme" class="Box md js-code-block-container Box--condensed">
                            <div class="Box-body p-5">
                                <article class="markdown-body entry-content container-lg" itemprop="text">
                                    <h1 align="center">
                                        {{ $article->title }}
                                    </h1>
                                    {!! $article->html !!}
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection
