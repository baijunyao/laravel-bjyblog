@extends('admin.layouts.admin')

@section('title', __('Admin Page'))

@section('nav', __('Admin Page'))

@section('description', __('Admin Page'))

@section('css')
    <style>
        .bjy-img{
            width: 52px;
        }
        .bjy-content{
            height: 352px;
        }
        ul.widget_tally .month{
            width: 50%;
        }
        ul.widget_tally .count{
            width: 50%;
        }
        .tile-stats h3 {
            height: 40px;
            line-height: 40px;
            font-size: 17px;
            text-indent: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="alert alert-warning alert-dismissible text-center">
        {{ __('Welcome to use the new admin dashboard') }}.
        <a href="{{ url('ant/#/ant/user/login') }}">{{ __('Click login') }}</a>
    </div>

    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">{{ $commentCount }}</div>
                <h3>{{ __('Number of comments') }}</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">{{ $socialiteUserCount }}</div>
                <h3>{{ __('Number of Socialite users') }}</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">{{ $articleCount }}</div>
                <h3>{{ __('Number of articles') }}</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-wechat"></i></div>
                <div class="count">{{ $chatCount }}</div>
                <h3>{{ __('Number of chats') }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ __('Latest logged in users') }}<small>top 5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($socialiteUserData as $k => $v)
                        <article class="media event">
                            <a class="pull-left">
                                <img class="bjy-img" src="{{ url($v->avatar) }}" alt="">
                            </a>
                            <div class="media-body">
                                {{ $v->name }}
                                <p>
                                    {{ __('Login times') }}：{{ $v->login_times }} <br>
                                    {{ __('Log in time') }}：{{ $v->updated_at }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ __('Recent Comments') }} <small>top5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($latestComments as $comment)
                        <article class="media event">
                            <a class="pull-left">
                                <img class="bjy-img" src="{{ asset($comment->socialiteUser->avatar) }}" alt="">
                            </a>
                            <div class="media-body">
                                {{ $comment->socialiteUser->name }}
                                <p>
                                    <a href="{{ $comment->article->url }}">{{ $comment->article->sub_title }}</a>
                                    <br>
                                    {{ Str::substr($comment->sub_content, 0, 10) }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ __('Server environment') }} <small>php</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content bjy-content">
                    <ul class="list-inline widget_tally">
                        <li>
                            <p>
                                <span class="month">{{ __('Blog version') }} </span>
                                <span class="count">{{ config('bjyblog.version') }} <a href="{{ url('admin/index/upgrade') }}" target="_blank">{{ __('Upgrade') }}</a></span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">{{ __('System') }} </span>
                                <span class="count">{{ $version['system'] }}</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">{{ __('Web server') }} </span>
                                <span class="count">{{ $version['webServer'] }}</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">PHP </span>
                                <span class="count">{{ $version['php'] }}</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">MySQL </span>
                                <span class="count">{{ $version['mysql'] }}</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
