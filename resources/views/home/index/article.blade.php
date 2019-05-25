@extends('layouts.home')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)

@section('content')
    <!-- 左侧文章开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <div class="row b-article">
            @if(auth()->guard('admin')->check())
                <a class="fa fa-edit b-edit-icon" href="{{ url('admin/article/edit', [$data->id]) }}"></a>
            @endif
            <h1 class="col-xs-12 col-md-12 col-lg-12 b-title">{{ $data->title }}</h1>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <ul class="row b-metadata">
                    <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> {{ $data->author }}</li>
                    <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> {{ $data->created_at }}</li>
                    <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="{{ $data->category->url }}">{{ $data->category->name }}</a>
                    <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                        @foreach($data->tags as $tag)
                            <a class="b-tag-name" href="{{ $tag->url }}">{{ $tag->name }}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
                <div class="js-content">{!! $data->html !!}</div>
                <p class="b-h-20"></p>
                <p class="b-copyright">
                    {!! htmlspecialchars_decode(config('bjyblog.copyright_word')) !!}
                </p>
                <ul class="b-prev-next">
                    <li class="b-prev">
                        上一篇：
                        @if(is_null($prev))
                            <span>没有了</span>
                        @else
                            <a href="{{ $prev->url }}">{{ $prev->title }}</a>
                        @endif

                    </li>
                    <li class="b-next">
                        下一篇：
                        @if(is_null($next))
                            <span>没有了</span>
                        @else
                            <a href="{{ $next->url }}">{{ $next->title }}</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <!-- social share -->
        @if( config('bjyblog.social_share.allow_social_share') === true )
        <div id="share"></div>
        @endif
        <!-- 引入通用评论开始 -->
        <script>
            var userEmail='{{ auth()->guard('oauth')->check() ? auth()->guard('oauth')->user()->email : '' }}';
            tuzkiNumber=1;
        </script>
        <div class="row b-comment">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-box">
                <img class="b-head-img" src="@if(auth()->guard('oauth')->check()){{ auth()->guard('oauth')->user()->avatar }}@else{{ asset('images/home/default_head_img.gif') }}@endif" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                <div class="b-box-textarea">
                    <div class="b-box-content js-hint" @if(auth()->guard('oauth')->check())contenteditable="true" @endif>请先登录后发表评论</div>
                    <ul class="b-emote-submit">
                        <li class="b-emote">
                            <i class="fa fa-smile-o js-get-tuzki"></i>
                            <input class="form-control b-email" type="text" name="email" placeholder="接收回复的email地址" value="{{ auth()->guard('oauth')->check() ? auth()->guard('oauth')->user()->email : '' }}">
                            <div class="b-tuzki">

                            </div>
                        </li>
                        <li class="b-submit-button">
                            <input class="js-comment-btn" type="button" value="评 论" aid="{{ request()->id }}" pid="0">
                        </li>
                        <li class="b-clear-float"></li>
                    </ul>
                </div>
                <div class="b-clear-float"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-title">
                <ul class="row">
                    <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6">最新评论</li>
                    <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">总共<span>{{ count($comment) }}</span>条评论</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-user-comment">
            @foreach($comment as $k => $v)
                <div id="comment-{{ $v['id'] }}" class="row b-user b-parent">
                    <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">
                        <img class="b-user-pic js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset($v['avatar']) }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                        @if($v['is_admin'] == 1)
                            <img class="b-crown" src="{{ asset('images/home/crown.png') }}" alt="{{ config('app.name') }}">
                        @endif
                    </div>
                    <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">
                        <p class="b-content">
                            <span class="b-user-name">{{ $v['name'] }}</span>：{!! $v['content'] !!}
                        </p>
                        <p class="b-date">
                            {{ $v['created_at'] }} <a class="js-reply" href="javascript:;" aid="{{ request()->id }}" pid="{{ $v['id'] }}" username="{{ $v['name'] }}">回复</a>
                        </p>
                        <foreach name="v['child']" item="n">
                        @foreach($v['child'] as $m => $n)
                            <div id="comment-{{ $n['id'] }}" class="row b-user b-child">
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">
                                    <img class="b-user-pic js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset($n['avatar']) }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                                    @if($n['is_admin'] == 1)
                                        <img class="b-crown" src="{{ asset('images/home/crown.png') }}" alt="{{ config('app.name') }}">
                                    @endif
                                </div>
                                <ul class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col">
                                    <li class="b-content">
                                        <span class="b-reply-name">{{ $n['name'] }}</span>
                                        <span class="b-reply">回复</span>
                                        <span class="b-user-name">{{ $n['reply_name'] }}</span>：{!! $n['content'] !!}
                                    </li>
                                    <li class="b-date">
                                        {{ $n['created_at'] }} <a class="js-reply" href="javascript:;" aid="{{ request()->id }}" pid="{{ $n['id'] }}" username="{{ $n['reply_name'] }}">回复</a>
                                    </li>
                                    <li class="b-clear-float"></li>
                                </ul>
                            </div>
                        @endforeach
                        <div class="b-clear-float"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="b-border"></div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <!-- 引入通用评论结束 -->
    </div>
    <!-- 左侧文章结束 -->
@endsection

@section('css')
<!-- @if( config('bjyblog.social_share.allow_social_share') === true)
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-plain.css" />
@endif -->
@endsection

@section('js')
    <script>
        // 添加行数
        $('pre').addClass('line-numbers');
        // 新页面跳转
        $('.js-content a').attr('target', '_blank')

        // 定义评论url
        ajaxCommentUrl = "{{ url('comment') }}";
        checkLogin = "{{ url('checkLogin') }}";
        titleName = '{{ config('app.name') }}';
    </script>
    <script src="{{ asset('statics/layer-2.4/layer.js') }}"></script>

    @if( config('bjyblog.social_share.allow_social_share') === true )
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>  -->
    <script>
        $("#share").jsSocials({
            @if( config('bjyblog.social_share.show_label') === true )
                showLabel: true,
            @else
                showLabel: false,
            @endif
            @if( config('bjyblog.social_share.show_label') === true )
                showCount: {!! config('bjyblog.social_share.show_count') !!},
            @else
                showCount: false,
            @endif
            shares: {!! config('bjyblog.social_share.networks') !!}
        });
    </script>
    @endif
@endsection
