@extends('layouts.home')

@section('title', $title)

@section('keywords', config('bjyblog.head.keywords'))

@section('description', config('bjyblog.head.description'))

@section('content')
    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8 b-chat">
        <div class="b-chat-left">
            @foreach($chat as $k => $v)
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
            @foreach($chat as $k => $v)
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
    <!-- 左侧列表结束 -->
@endsection