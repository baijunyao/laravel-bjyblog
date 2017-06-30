@extends('layouts.admin')

@section('title', '管理后台首页')

@section('nav', '后台首页')

@section('description', '后台管理首页')

@section('css')
    <link href="{{ asset('statics/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <style>
        .bjy-img{
            width: 52px;
        }
    </style>
@endsection

@section('content')

    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">{{ $commentCount }}</div>
                <h3>总评论数</h3>
                {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">{{ $oauthUserCount }}</div>
                <h3>第三方用户</h3>
                {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">{{ $articleCount }}</div>
                <h3>原创文章</h3>
                {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-wechat"></i></div>
                <div class="count">{{ $chatCount }}</div>
                <h3>随言碎语</h3>
                {{--<p>Lorem ipsum psdea itgum rixt.</p>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>最新登录的用户<small>top 5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($oauthUserData as $k => $v)
                        <article class="media event">
                            <a class="pull-left">
                                <img class="bjy-img" src="{{ url($v->avatar) }}" alt="">
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{ $v->name }}</a>
                                <p>
                                    登录次数：{{ $v->login_times }} <br>
                                    登录时间：{{ $v->updated_at }}
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
                    <h2>最新评论 <small>top5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item One Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Three Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>环境 <small>php</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item One Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Two Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="month">April</p>
                            <p class="day">23</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">Item Three Title</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endsection
