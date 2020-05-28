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
