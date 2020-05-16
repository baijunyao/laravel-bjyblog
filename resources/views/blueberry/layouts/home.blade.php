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
                <li class="b-nav-cname  @if(request()->path() === '/') b-nav-active @endif">
                    <a href="/">{{ __('Home') }}</a>
                </li>
                @foreach($category as $v)
                    <li class="b-nav-cname @if((request()->fullUrl() === $v->url) || (isset($article) && $article->category_id ===$v->id)) b-nav-active @endif">
                        <a href="{{ $v->url }}">{{ $v->name }}</a>
                    </li>
                @endforeach
                @foreach($nav as $v)
                    <li class="b-nav-cname @if(request()->path() === $v->url) b-nav-active @endif">
                        <a href="{{ url($v->url) }}">{{ $v->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(auth()->guard('socialite')->check())
                    <li class="b-user-info" data-user-id="{{ auth()->guard('socialite')->user()->id }}">
                        <span><img class="b-head_img" src="{{ auth()->guard('socialite')->user()->avatar }}" alt="{{ auth()->guard('socialite')->user()->name }}" title="{{ auth()->guard('socialite')->user()->name }}" /></span>
                        <span class="b-nickname">{{ auth()->guard('socialite')->user()->name }}</span>
                        <span><a href="{{ url('auth/socialite/logout') }}">{{ __('Sign out') }}</a></span>
                    </li>
                @else
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a class="js-login-btn" href="javascript:;">{{ __('Sign In') }}</a>
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
                    <input class="b-search-submit" type="submit" value="{{ __('Search') }}">
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
                                @if(!empty($qqQunArticle['id']))
                                    <a href="{{ url('article', [$qqQunArticle['id']]) }}" target="{{ config('bjyblog.link_target') }}">{{ $qqQunArticle['title'] }}</a>
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="b-tags">
                <h4 class="b-title">{{ __('Hot Tags') }}</h4>
                <ul class="b-all-tname">
                    @foreach($tag as $v)
                        <li class="b-tname">
                            <a class="b-tag-style-{{ $loop->index%4 }}" href="{{ $v->url }}">{{ $v->name }} ({{ $v->articles_count }})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">{{ __('Top Articles') }}</h4>
                <p class="b-recommend-p">
                    @foreach($topArticle as $v)
                        <a class="b-recommend-a" href="{{ $v->url }}" target="{{ config('bjyblog.link_target') }}"><span class="fa fa-th-list b-black"></span> {{ $v->title }}</a>
                    @endforeach
                </p>
            </div>
            <div class="b-comment-list">
                <h4 class="b-title">{{ __('Recent Comments') }}</h4>
                <div>
                    @foreach($latestComments as $comment)
                        <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                            <img class="b-head-img bjy-lazyload" src="{{ cdn_url('uploads/avatar/default.jpg') }}" data-src="{{ cdn_url($comment->socialiteUser->avatar) }}" alt="{{ $comment->socialiteUser->name }}">
                            <li class="b-nickname">
                                {{ $comment->socialiteUser->name }} <i class="fa fa-{{ $comment->socialiteUser->socialiteClient->icon }}"></i> <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </li>
                            <li class="b-nc-article">
                                {{ __('Comment') }} <a href="{{ $comment->article->url }}#comment-{{ $comment->id }}" target="{{ config('bjyblog.link_target') }}">{{ $comment->article->sub_title }}</a>
                            </li>
                            <li class="b-content">
                                {!! $comment->sub_content !!}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="b-link">
                <h4 class="b-title">{{ __('Links') }}</h4>
                <p>
                    @foreach($friendshipLink as $v)
                        <a class="b-link-a" href="{{ $v->url }}" target="{{ config('bjyblog.link_target') }}"><span class="fa fa-link b-black"></span> {{ $v->name }}</a>
                    @endforeach
                        <a class="b-link-a" href="{{ url('site') }}"><span class="fa fa-link b-black"></span> {{ __('More') }} </a>
                </p>
            </div>
        </div>
    </div>
</div>

<footer id="b-foot">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-6 col-md-{{ $homeFootColNumber }} col-lg-{{ $homeFootColNumber }}">
                <dt>{{ __('Rights') }}</dt>
                <dd>{{ __('Licenses') }}：<a rel="nofollow" href="https://creativecommons.org/licenses/by{{ config('bjyblog.licenses.allow_commercial') . config('bjyblog.licenses.allow_adaptation') }}/4.0/deed.{{ config('bjyblog.licenses.language') }}" target="{{ config('bjyblog.link_target') }}">CC BY-NC 4.0</a></dd>
                <dd>{{ __('Copyright') }}：© 2014-{{ date('Y') }}</dd>
                @if(!empty(config('bjyblog.admin_email')))
                    <dd>{{ __('Contact Email') }}：<a href="mailto:{!! config('bjyblog.admin_email') !!}">{!! config('bjyblog.admin_email') !!}</a></dd>
                @endif
                @if(!empty(config('bjyblog.icp')) && config('app.locale') === 'zh-CN')
                    <dd>{{ __('ICP') }}：<a rel="nofollow" href="http://www.beian.miit.gov.cn" target="{{ config('bjyblog.link_target') }}">{{ config('bjyblog.icp') }}</a></dd>
                @endif
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-{{ $homeFootColNumber }} col-lg-{{ $homeFootColNumber }}">
                <dt>{{ __('Structure') }}</dt>
                <dd>{{ __('Project Name') }}：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="{{ config('bjyblog.link_target') }}">laravel-bjyblog</a></dd>
                <dd>{{ __('Blog Version') }}：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="{{ config('bjyblog.link_target') }}">{{ config('bjyblog.version') }}-{{ config('bjyblog.branch') }}</a></dd>
                <dd>{{ __('Framework Version') }}：<a rel="nofollow"  href="https://github.com/laravel/framework" target="{{ config('bjyblog.link_target') }}">laravel-v{{ \Illuminate\Foundation\Application::VERSION }}</a></dd>
                <dd>{{ __('Project Author') }}：<a href="https://baijunyao.com">{{ __('Junyao Bai') }}</a></dd>
                <dd>{{ __('Theme Name') }}：<a rel="nofollow" href="https://github.com/baijunyao/blog-theme-blueberry">blog-theme-blueberry</a></dd>
                <dd>{{ __('Theme Author') }}：<a href="https://baijunyao.com">{{ __('Junyao Bai') }}</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-{{ $homeFootColNumber }} col-lg-{{ $homeFootColNumber }}">
                <dt>{{ __('Counts') }}</dt>
                <dd>{{ __('Article Counts') }}：{{ $articleCount }}</dd>
                <dd>{{ __('Comment Counts') }}：{{ $commentCount }}</dd>
                <dd>{{ __('User Counts') }}：{{ $socialiteUserCount }}</dd>
                <dd>{{ __('Note Counts') }}：{{ $chatCount }}</dd>
            </dl>

            @if($homeFootColNumber === 3)
                <dl class="col-xs-12 col-sm-12 col-md-{{ $homeFootColNumber }} col-lg-{{ $homeFootColNumber }} b-social">
                    <dt>{{ __('Social') }}</dt>
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
                    <h4 class="modal-title b-ta-center" id="myModalLabel">{{ __('Without registration, you can log in with the account below.') }}</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                @foreach($socialiteClients as $socialiteClient)
                    <a class="fa fa-{{ $socialiteClient->icon }}" href="{{ url('auth/socialite/redirectToProvider/' . $socialiteClient->name) }}" alt="{{ $socialiteClient->name }}" title="{{ $socialiteClient->name }}"></a>
                @endforeach

                @if($socialiteClients->isEmpty())
                    {{ __('Need to add socialite client first.') }} <a href="{{ url('admin/socialiteClient/index') }}">{{ __('Click to go') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    // 定义评论url
    ajaxCommentUrl = "{{ url('comment') }}";
    ajaxLikeUrl = "{{ url('like/store') }}";
    ajaxUnLikeUrl = "{{ url('like/destroy') }}";
    socialiteUserShowUrl = "{{ url('socialiteUser/me') }}";
    titleName = '{{ config('app.name') }}';
    jsSocialsConfig = {!! config('bjyblog.social_share.jssocials_config') !!};
    sharejsConfig = {!! config('bjyblog.social_share.sharejs_config') !!};
    pleaseLogInFirst = '{{ __('Please log in first.') }}';
    submittedSuccessfullyWaitingForApprove = '{{ __('Submitted successfully, waiting for approve.') }}';
</script>
<script src="{{ mix('js/app.js') }}"></script>
{!! htmlspecialchars_decode(config('bjyblog.statistics')) !!}
@yield('js')
</body>
</html>
