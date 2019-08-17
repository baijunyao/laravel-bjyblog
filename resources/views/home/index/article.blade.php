@extends('layouts.home')

@section('title', $article->title)

@section('keywords', $article->keywords)

@section('description', $article->description)

@section('content')
    <!-- 左侧文章开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <div class="row b-article">
            @if(auth()->guard('admin')->check())
                <a class="fa fa-edit b-edit-icon" href="{{ url('admin/article/edit', [$article->id]) }}"></a>
            @endif
            <h1 class="col-xs-12 col-md-12 col-lg-12 b-title">{{ $article->title }}</h1>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <ul class="row b-metadata">
                    <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> {{ $article->author }}</li>
                    <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> {{ $article->created_at }}</li>
                    <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="{{ $article->category->url }}">{{ $article->category->name }}</a>
                    <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                        @foreach($article->tags as $tag)
                            <a class="b-tag-name" href="{{ $tag->url }}">{{ $tag->name }}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
                <div class="js-content">{!! $article->html !!}</div>
                <p class="b-h-20"></p>
                <p class="b-copyright">
                    {!! htmlspecialchars_decode(config('bjyblog.copyright_word')) !!}
                </p>
                <div class="b-share-plugin">
                    @if(config('bjyblog.social_share.select_plugin') === 'sharejs')
                        <div id="b-share-js"></div>
                    @else
                        <div id="b-js-socials"></div>
                    @endif
                </div>
                <ul class="b-prev-next">
                    <li class="b-prev">
                         {{ __('Previous Article') }}：
                        @if(is_null($prev))
                            <span>{{ __('No More Article') }}</span>
                        @else
                            <a href="{{ $prev->url }}">{{ $prev->title }}</a>
                        @endif

                    </li>
                    <li class="b-next">
                        {{ __('Next Article') }}：
                        @if(is_null($next))
                            <span>{{ __('No More Article') }}</span>
                        @else
                            <a href="{{ $next->url }}">{{ $next->title }}</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <!-- 引入通用评论开始 -->
        <script>
            var userEmail='{{ auth()->guard('socialite')->check() ? auth()->guard('socialite')->user()->email : '' }}';
            tuzkiNumber=1;
        </script>
        <div class="row b-comment">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-box">
                <img class="b-head-img" src="@if(auth()->guard('socialite')->check()){{ auth()->guard('socialite')->user()->avatar }}@else{{ asset('images/home/default_head_img.gif') }}@endif" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                <div class="b-box-textarea">
                    <div class="b-box-content js-hint" @if(auth()->guard('socialite')->check())contenteditable="true" @endif>{{ __('Please login to comment') }}</div>
                    <ul class="b-emote-submit">
                        <li class="b-emote">
                            <i class="fa fa-smile-o js-get-tuzki"></i>
                            <input class="form-control b-email" type="text" name="email" placeholder="{{ __('Email for notifications') }}" value="{{ auth()->guard('socialite')->check() ? auth()->guard('socialite')->user()->email : '' }}">
                            <div class="b-tuzki">

                            </div>
                        </li>
                        <li class="b-submit-button">
                            <input class="js-comment-btn" type="button" value="{{ __('Submit') }}" aid="{{ request()->id }}" pid="0">
                        </li>
                        <li class="b-clear-float"></li>
                    </ul>
                </div>
                <div class="b-clear-float"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-comment-title">
                <ul class="row">
                    <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6">{{ __('latest comments') }}</li>
                    <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">{!! __('others.comment_count', ['count' => count($comment)]) !!}</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 b-user-comment">
            @foreach($comment as $k => $v)
                <div id="comment-{{ $v['id'] }}" class="row b-user b-parent">
                    <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">
                        <img class="b-user-pic bjy-lazyload" src="{{ asset('uploads/avatar/default.jpg') }}" data-src="{{ asset($v['avatar']) }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                        @if($v['is_admin'] == 1)
                            <img class="b-crown" src="{{ asset('images/home/crown.png') }}" alt="{{ config('app.name') }}">
                        @endif
                    </div>
                    <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col b-cc-first">
                        <p class="b-content">
                            <span class="b-user-name">{{ $v['name'] }}</span>：{!! $v['content'] !!}
                        </p>
                        <p class="b-date">
                            {{ $v['created_at'] }} <a class="js-reply" href="javascript:;" aid="{{ request()->id }}" pid="{{ $v['id'] }}" username="{{ $v['name'] }}">{{ __('Reply') }}</a>
                        </p>
                        @foreach($v['child'] as $m => $n)
                            <div id="comment-{{ $n['id'] }}" class="row b-user b-child">
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 b-pic-col">
                                    <img class="b-user-pic bjy-lazyload" src="{{ asset('uploads/avatar/default.jpg') }}" data-src="{{ asset($n['avatar']) }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                                    @if($n['is_admin'] == 1)
                                        <img class="b-crown" src="{{ asset('images/home/crown.png') }}" alt="{{ config('app.name') }}">
                                    @endif
                                </div>
                                <ul class="col-xs-10 col-sm-11 col-md-11 col-lg-11 b-content-col">
                                    <li class="b-content">
                                        <span class="b-reply-name">{{ $n['name'] }}</span>
                                        <span class="b-reply">{{ __('Reply') }}</span>
                                        <span class="b-user-name">{{ $n['reply_name'] }}</span>：{!! $n['content'] !!}
                                    </li>
                                    <li class="b-date">
                                        {{ $n['created_at'] }} <a class="js-reply" href="javascript:;" aid="{{ request()->id }}" pid="{{ $n['id'] }}" username="{{ $n['reply_name'] }}">{{ __('Reply') }}</a>
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

@section('js')
    <script>
        $('pre').addClass('line-numbers');
        $('.js-content a').attr('target', '_blank')
        translate = {
            pleaseLoginToComment: "{{ __('Please login to comment') }}",
            pleaseLoginToReply: "{{ __('Please login to reply') }}",
            emailForNotifications: "{{ __('Email for notifications') }}",
            pleaseLogin: "{{ __('Please login') }}",
            reply: "{{ __('Reply') }}"
        }
        $.each($('.js-content img'), function (k, v) {
            $(v).wrap(function(){
                return "<a class='js-fluidbox' href='"+$(v).attr('src')+"'></a>"
            });
        })
        $('.js-content').html(editormd.emojiRenderer($('.js-content').html()));
        $('.js-fluidbox').fluidbox();
        $('#b-share-js').share(sharejsConfig);
        $('#b-js-socials').jsSocials(jsSocialsConfig)
    </script>
    <script src="{{ asset('statics/layer-2.4/layer.js') }}"></script>
@endsection
