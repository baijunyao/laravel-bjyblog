<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ $config['WEB_TITLE'] }} @endif</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="baijunyao,{{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>
<!-- 顶部导航开始 -->
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <div class="hidden-xs b-nav-background"></div>
                <ul class="b-logo-code">
                    <li class="b-lc-start">&lt;?php</li>
                    <li class="b-lc-echo">echo</li>
                </ul>
                <p class="b-logo-word">'{{ $config['WEB_NAME'] }}'</p>
                <p class="b-logo-end">;</p>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname  @if($category_id == 'index') b-nav-active @endif">
                <a href="/">首页</a>
                </li>
                @foreach($category as $v)
                    <li class="b-nav-cname @if($v->id == $category_id) b-nav-active @endif">
                        <a href="{{ url('category/'.$v->id) }}">{{ $v->name }}</a>
                    </li>
                @endforeach
                <li class="b-nav-cname @if($category_id == 'chat') b-nav-active @endif">
                <a href="{{ url('chat') }}">随言碎语</a>
                </li>
                @if(!$gitProject->isEmpty())
                    <li class="b-nav-cname hidden-sm  @if($category_id == 'git') b-nav-active @endif">
                    <a href="{{ url('git') }}">开源项目</a>
                    </li>
                @endif
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(empty(session('user.name')))
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a class="js-login-btn" href="javascript:;">登录</a>
                    </li>
                @else
                    <li class="b-user-info">
                        <span><img class="b-head_img" src="{{ session('user.avatar') }}" alt="{{ session('user.name') }}" title="{{ session('user.name') }}" /></span>
                        <span class="b-nickname">{{ session('user.name') }}</span>
                        <span><a href="{{ url('auth/oauth/logout') }}">退出</a></span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->

<div class="b-h-70"></div>

<div id="b-content" class="container">
    <div class="row">
        @yield('content')
        <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-search">
                <form class="form-inline"  role="form" action="{{ url('search') }}" method="get">
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
            @if(!empty($config['QQ_QUN_NUMBER']))
                <div class="b-qun">
                    <h4 class="b-title">加入组织</h4>
                    <ul class="b-all-tname">
                        <li class="b-qun-or-code">
                            <img src="{{ asset($config['QQ_QUN_OR_CODE']) }}" alt="QQ">
                        </li>
                        <li class="b-qun-word">
                            <p class="b-qun-nuber">
                                1. 手Q扫左侧二维码
                            </p>
                            <p class="b-qun-nuber">
                                2. 搜Q群：{{ $config['QQ_QUN_NUMBER'] }}
                            </p>
                            <p class="b-qun-code">
                                3. 点击{!! $config['QQ_QUN_CODE'] !!}
                            </p>
                            <p class="b-qun-article">
                                @if(!empty($qqQunArticle['id']))
                                    <a href="{{ url('article', [$qqQunArticle['id']]) }}" target="_blank">{{ $qqQunArticle['title'] }}</a>
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <?php $tag_i = 0; ?>
                    @foreach($tag as $v)
                        <?php $tag_i++; ?>
                        <?php $tag_i=$tag_i==5?1:$tag_i; ?>
                        <li class="b-tname">
                            <a class="tstyle-{{ $tag_i }}" href="{{ url('tag', [$v->id]) }}">{{ $v->name }} ({{ $v->articles_count }})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">
                    @foreach($topArticle as $v)
                        <a class="b-recommend-a" href="{{ url('article', [$v->id]) }}" target="_blank"><span class="fa fa-th-list b-black"></span> {{ $v->title }}</a>
                    @endforeach
                </p>
            </div>
            <div class="b-comment-list">
                <h4 class="b-title">最新评论</h4>
                <div>
                    @foreach($newComment as $v)
                        <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                            <img class="b-head-img js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset($v->avatar) }}" alt="{{ $v->name }}">
                            <li class="b-nickname">
                                {{ $v->name }}<span>{{ word_time($v->created_at) }}</span>
                            </li>
                            <li class="b-nc-article">
                                在<a href="{{ url('article', [$v->article_id]) }}" target="_blank">{{ $v->title }}</a>中评论
                            </li>
                            <li class="b-content">
                                {!! $v->content !!}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="b-link">
                <h4 class="b-title">友情链接</h4>
                <p>
                    @foreach($friendshipLink as $v)
                        <a class="b-link-a" href="{{ $v->url }}" target="_blank"><span class="fa fa-link b-black"></span> {{ $v->name }}</a>
                    @endforeach
                </p>
            </div>
        </div>
        <!-- 通用右部区域结束 -->
    </div>

</div>
<!-- 主体部分结束 -->

<!-- 通用底部开始 -->
<footer id="b-foot">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <dt>权益</dt>
                <dd>许可协议：<a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh">CC BY-NC 4.0</a></dd>
                <dd>版权所有：© 2014-{{ date('Y') }} {{ parse_url(config('app.url'))['host'] }}</dd>
                @if(!empty($config['WEB_ICP_NUMBER']))
                    <dd>网站备案：{{ $config['WEB_ICP_NUMBER'] }}</dd>
                @endif
                @if(!empty($config['ADMIN_EMAIL']))
                    <dd>联系邮箱：<a href="mailto:{!! $config['ADMIN_EMAIL'] !!}">{!! $config['ADMIN_EMAIL'] !!}</a></dd>
                @endif
            </dl>

            <dl class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <dt>架构</dt>
                <dd>项目名称：<a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">laravel-bjyblog</a></dd>
                <dd>版本分支：{{ config('bjyblog.version') }}-{{ config('bjyblog.branch') }}</dd>
                <dd>项目作者：<a href="https://baijunyao.com">白俊遥</a></dd>
                <dd>主题名称：<a rel="nofollow" href="https://github.com/baijunyao/blog-theme-blueberry">blog-theme-blueberry</a></dd>
                <dd>主题作者：<a href="https://baijunyao.com">白俊遥</a></dd>
            </dl>

            <dl class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <dt>统计</dt>
                <dd>文章总数：{{ $articleCount }}</dd>
                <dd>评论总数：{{ $commentCount }}</dd>
                <dd>登录用户：{{ $oauthUserCount }}</dd>
                <dd>随言碎语：{{ $chatCount }}</dd>
            </dl>
        </div>
    </div>
    <a class="go-top fa fa-angle-up animated jello" href="javascript:;"></a>
</footer>
<!-- 通用底部结束 -->

<!-- 登录模态框开始 -->
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row">
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="{{ url('auth/oauth/redirectToProvider/qq') }}"><img src="{{ asset('images/home/qq-login.png') }}" alt="QQ登录" title="QQ登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="{{ url('auth/oauth/redirectToProvider/weibo') }}"><img src="{{ asset('images/home/sina-login.png') }}" alt="微博登录" title="微博登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="{{ url('auth/oauth/redirectToProvider/github') }}"><img src="{{ asset('images/home/github-login.jpg') }}" alt="github登录" title="github登录"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 登录模态框结束 -->

<script src="{{ mix('js/app.js') }}"></script>
<!-- 百度统计开始 -->
{!! htmlspecialchars_decode($config['WEB_STATISTICS']) !!}
<!-- 百度统计结束 -->
@yield('js')
</body>
</html>
