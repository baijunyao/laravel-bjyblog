<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ config('bjyblog.head.title') }} @endif</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(Str::isTrue(config('bjyblog.logo_with_php_tag')))
                <a class="navbar-brand" href="/">
                    <div class="hidden-xs b-nav-background"></div>
                    <ul class="b-logo-code">
                        <li class="b-lc-start">&lt;?php</li>
                        <li class="b-lc-echo">echo</li>
                    </ul>
                    <p class="b-logo-word">'{{ config('app.name') }}'</p>
                    <p class="b-logo-end">;</p>
                </a>
            @else
                <a class="navbar-brand" href="/">
                    <div class="hidden-xs b-nav-background"></div>
                    <p class="b-logo-word">{{ config('app.name') }}</p>
                </a>
            @endif
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname  @if(request()->route()->named('home.articles.index')) b-nav-active @endif">
                    <a href="/">{{ translate('Home') }}</a>
                </li>
                @foreach($categories as $category)
                    <li class="b-nav-cname @if((request()->fullUrl() === $category->url) || (request()->route()->named('home.articles.show') && $article->category_id === $category->id)) b-nav-active @endif">
                        <a href="{{ $category->url }}">{{ $category->name }}</a>
                    </li>
                @endforeach
                @foreach($navs as $nav)
                    <li class="b-nav-cname @if(request()->fullUrl() === url($nav->url)) b-nav-active @endif">
                        <a href="{{ url($nav->url) }}">{{ $nav->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(auth()->guard('socialite')->check())
                    <li class="b-user-info" data-user-id="{{ auth()->guard('socialite')->user()->id }}">
                        <span><img class="b-head_img" src="{{ auth()->guard('socialite')->user()->avatar }}" alt="{{ auth()->guard('socialite')->user()->name }}" title="{{ auth()->guard('socialite')->user()->name }}" /></span>
                        <span class="b-nickname">{{ auth()->guard('socialite')->user()->name }}</span>
                        <span><a class="js-logout-btn" href="javascript:;">{{ translate('Sign out') }}</a></span>
                    </li>
                @else
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a class="js-login-btn" href="javascript:;">{{ translate('Sign In') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>

<div class="b-h-70"></div>

<div id="b-content" class="container">
    <div class="row">
        @yield('content')
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-search">
                <form class="form-inline" role="form" action="{{ url('search') }}" method="get">
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="{{ translate('Search') }}">
                </form>
            </div>
            @if(!empty(config('bjyblog.qq_qun.number')) && config('app.locale') === 'zh-CN')
                <div class="b-qun">
                    <h4 class="b-title">加入组织</h4>
                    <ul class="b-all-tname">
                        <li class="b-qun-or-code">
                            <img src="{{ asset(config('bjyblog.qq_qun.or_code')) }}" alt="QQ">
                        </li>
                        <li class="b-qun-word">
                            <p class="b-qun-nuber">
                                1. 手Q扫左侧二维码
                            </p>
                            <p class="b-qun-nuber">
                                2. 搜Q群：{{ config('bjyblog.qq_qun.number') }}
                            </p>
                            <p class="b-qun-code">
                                3. 点击{!! config('bjyblog.qq_qun.code') !!}
                            </p>
                            <p class="b-qun-article">
                                @if(!empty($qq_qun_article['id']))
                                    <a href="{{ url('articles', [$qq_qun_article['id']]) }}" target="{{ config('bjyblog.link_target') }}">{{ $qq_qun_article['title'] }}</a>
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="b-tags">
                <h4 class="b-title">{{ translate('Hot Tags') }}</h4>
                <ul class="b-all-tname">
                    @foreach($tags as $tag)
                        <li class="b-tname">
                            <a class="b-tag-style-{{ $loop->index%4 }}" href="{{ $tag->url }}">{{ $tag->name }} ({{ $tag->articles_count }})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">{{ translate('Top Articles') }}</h4>
                <p class="b-recommend-p">
                    @foreach($top_article as $article)
                        <a class="b-recommend-a" href="{{ $article->url }}" target="{{ config('bjyblog.link_target') }}"><span class="fa fa-th-list b-black"></span> {{ $article->title }}</a>
                    @endforeach
                </p>
            </div>
            <div class="b-comment-list">
                <h4 class="b-title">{{ translate('Recent Comments') }}</h4>
                <div>
                    @foreach($latest_comments as $comment)
                        <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                            <img class="b-head-img bjy-lazyload" src="{{ cdn_url('images/default/avatar.jpg') }}" data-src="{{ cdn_url($comment->socialiteUser->avatar) }}" alt="{{ $comment->socialiteUser->name }}">
                            <li class="b-nickname">
                                {{ $comment->socialiteUser->name }} <i class="fa fa-{{ $comment->socialiteUser->socialiteClient->icon }}"></i> <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </li>
                            <li class="b-nc-article">
                                {{ translate('Comment') }} <a href="{{ $comment->article->url }}#comment-{{ $comment->id }}" target="{{ config('bjyblog.link_target') }}">{{ $comment->article->sub_title }}</a>
                            </li>
                            <li class="b-content">
                                {!! $comment->sub_content !!}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="b-link">
                <h4 class="b-title">{{ translate('Links') }}</h4>
                <p>
                    @foreach($friends as $friend)
                        <a class="b-link-a" href="{{ $friend->url }}" target="{{ config('bjyblog.link_target') }}"><span class="fa fa-link b-black"></span> {{ $friend->name }}</a>
                    @endforeach
                        <a class="b-link-a" href="{{ url('sites') }}"><span class="fa fa-link b-black"></span> {{ translate('More') }} </a>
                </p>
            </div>
        </div>
    </div>
</div>

<footer id="b-foot">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-6 col-md-{{ $home_foot_col_number }} col-lg-{{ $home_foot_col_number }}">
                <dt>{{ translate('Rights') }}</dt>
                <dd>{{ translate('Licenses') }}：<a rel="nofollow" href="https://creativecommons.org/licenses/by{{ config('bjyblog.licenses.allow_commercial') . config('bjyblog.licenses.allow_adaptation') }}/4.0/deed.{{ config('bjyblog.licenses.language') }}" target="{{ config('bjyblog.link_target') }}">CC BY-NC 4.0</a></dd>
                <dd>{{ translate('Copyright') }}：© 2014-{{ date('Y') }}</dd>
                @if(!empty(config('bjyblog.admin_email')))
                    <dd>{{ translate('Contact Email') }}：<a href="mailto:{!! config('bjyblog.admin_email') !!}">{!! config('bjyblog.admin_email') !!}</a></dd>
                @endif
                @if(!empty(config('bjyblog.icp')) && config('app.locale') === 'zh-CN')
                    <dd>{{ translate('ICP') }}：<a rel="nofollow" href="https://beian.miit.gov.cn" target="{{ config('bjyblog.link_target') }}">{{ config('bjyblog.icp') }}</a></dd>
                @endif
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-{{ $home_foot_col_number }} col-lg-{{ $home_foot_col_number }}">
                <dt>{{ translate('Structure') }}</dt>
                <dd>{{ translate('Project Name') }}：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="{{ config('bjyblog.link_target') }}">laravel-bjyblog</a></dd>
                <dd>{{ translate('Blog Version') }}：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="{{ config('bjyblog.link_target') }}">{{ config('bjyblog.version') }}-{{ config('bjyblog.branch') }}</a></dd>
                <dd>{{ translate('Framework Version') }}：<a rel="nofollow"  href="https://github.com/laravel/framework" target="{{ config('bjyblog.link_target') }}">laravel-v{{ \Illuminate\Foundation\Application::VERSION }}</a></dd>
                <dd>{{ translate('Project Author') }}：<a href="https://baijunyao.com">{{ translate('Junyao Bai') }}</a></dd>
                <dd>{{ translate('Theme Name') }}：<a rel="nofollow" href="https://github.com/baijunyao/blog-theme-blueberry">blog-theme-blueberry</a></dd>
                <dd>{{ translate('Theme Author') }}：<a href="https://baijunyao.com">{{ translate('Junyao Bai') }}</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-{{ $home_foot_col_number }} col-lg-{{ $home_foot_col_number }}">
                <dt>{{ translate('Counts') }}</dt>
                <dd>{{ translate('Article Counts') }}：{{ $article_count }}</dd>
                <dd>{{ translate('Comment Counts') }}：{{ $comment_count }}</dd>
                <dd>{{ translate('User Counts') }}：{{ $socialite_user_count }}</dd>
                <dd>{{ translate('Note Counts') }}：{{ $chat_count }}</dd>
            </dl>

            @if($home_foot_col_number === 3)
                <dl class="col-xs-12 col-sm-12 col-md-{{ $home_foot_col_number }} col-lg-{{ $home_foot_col_number }} b-social">
                    <dt>{{ translate('Social') }}</dt>
                    <dd class="b-small-logo">
                        @foreach(config('bjyblog.social_links') as $name => $link)
                            @if($link !== '')
                                <a rel="nofollow" href="{{ $link }}" target="{{ config('bjyblog.link_target') }}"><img src="{{ url("images/home/social-$name.png") }}" alt="{{ $name }}"></a>
                            @endif
                        @endforeach
                    </dd>
                </dl>
            @endif
        </div>
    </div>
    <a class="go-top fa fa-angle-up animated jello" href="javascript:;"></a>
</footer>

<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">{{ translate('Without registration, you can log in with the account below.') }}</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                @foreach($socialite_clients as $socialiteClient)
                    <a class="fa fa-{{ $socialiteClient->icon }}" href="{{ url('auth/socialite/redirectToProvider/' . $socialiteClient->name) }}" alt="{{ $socialiteClient->name }}" title="{{ $socialiteClient->name }}"></a>
                @endforeach

                @if($socialite_clients->isEmpty())
                    {{ translate('Need to add socialite client first.') }} <a href="{{ url('admin/#/admin/socialiteClient/index') }}">{{ translate('Click to go') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    // 定义评论url
    ajaxCommentUrl = "{{ url('comments') }}";
    ajaxLikeUrl = "{{ url('likes/store') }}";
    ajaxUnLikeUrl = "{{ url('likes/destroy') }}";
    ajaxLogoutUrl = "{{ url('auth/socialite/logout') }}";
    ajaxSiteUrl = "{{ url('sites') }}";
    socialiteUserShowUrl = "{{ url('socialiteUsers/me') }}";
    titleName = '{{ config('app.name') }}';
    jsSocialsConfig = {!! config('bjyblog.social_share.jssocials_config') !!};
    sharejsConfig = {!! config('bjyblog.social_share.sharejs_config') !!};
    pleaseLogInFirst = '{{ translate('Please log in first.') }}';
    submittedSuccessfullyWaitingForApprove = '{{ translate('Submitted successfully, waiting for approve.') }}';
</script>
<script src="{{ mix('js/app.js') }}"></script>
{!! htmlspecialchars_decode(config('bjyblog.statistics')) !!}
@yield('js')
</body>
</html>
