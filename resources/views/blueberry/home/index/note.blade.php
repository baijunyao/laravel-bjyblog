@extends('blueberry.layouts.home')

@section('title', $title)

@section('keywords', config('bjyblog.head.keywords'))

@section('description', config('bjyblog.head.description'))

@section('content')
    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        @if(Str::isTrue(config('bjyblog.breadcrumb')))
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 b-breadcrumb">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
        @endif
        <div class="row b-chat">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="b-chat-left">
                    @foreach($notes as $k => $v)
                        @if($k%2 == 0)
                            <ul class="b-chat-one animated bounceInLeft">
                                <li class="b-chat-title ">{{ $v->created_at }}</li>
                                <li class="b-chat-content">{{ $v->content }}</li>
                                <div class="b-arrows-right1">
                                    <div class="b-arrows-round"></div>
                                </div>
                                <div class="b-arrows-right2"></div>
                            </ul>
                        @endif
                    @endforeach
                </div>
                <div class="b-chat-middle"></div>
                <div class="b-chat-right">
                    @foreach($notes as $k => $v)
                        @if($k%2 == 1)
                            <ul class="b-chat-one animated bounceInRight">
                                <li class="b-chat-title ">{{ $v->created_at }}</li>
                                <li class="b-chat-content">{{ $v->content }}</li>
                                <div class="b-arrows-right1">
                                    <div class="b-arrows-round"></div>
                                </div>
                                <div class="b-arrows-right2"></div>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- 左侧列表结束 -->
@endsection
