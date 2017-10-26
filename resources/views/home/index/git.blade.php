@extends('layouts.home')

@section('title', $config['WEB_TITLE'])

@section('keywords', $config['WEB_KEYWORDS'])

@section('description', $config['WEB_DESCRIPTION'])

@section('css')
    <style>
        .pro_name a{color: #4183c4;}
        .osc_git_title{background-color: #d8e5f1;}
        .osc_git_box{background-color: #fafafa;}
        .osc_git_box{border-color: #ddd;}
        .osc_git_info{color: #666;}
        .osc_git_main a{color: #4183c4;}
    </style>
@endsection

@section('content')
    {{--左侧开源项目开始--}}
    <div class="col-xs-12 col-md-12 col-lg-8 b-chat">

        <div class="github-widget" data-repo="baijunyao/thinkphp-bjyadmin"></div>
        <script src='//git.oschina.net/shuaibai123/thinkphp-bjyadmin/widget_preview'></script>

        <div class="github-widget" data-repo="baijunyao/thinkphp-bjyblog"></div>
        <script src='//git.oschina.net/shuaibai123/thinkbjy/widget_preview'></script>

        <div class="github-widget" data-repo="baijunyao/laravel-bjyadmin"></div>
        <div class="github-widget" data-repo="baijunyao/laravel-bjyblog"></div>

        <script src='//git.oschina.net/shuaibai123/laravel-bjyadmin/widget_preview'></script>
        <script src='//git.oschina.net/shuaibai123/laravel-bjyblog/widget_preview'></script>
    </div>
    {{--左侧开源项目结束--}}
@endsection

@section('js')
    {{--githuh widget--}}
    <script src="{{ asset('statics/js/jquery.githubRepoWidget.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.osc_git_box a,.github-widget a').attr('target','_blank');
        })
    </script>
@endsection