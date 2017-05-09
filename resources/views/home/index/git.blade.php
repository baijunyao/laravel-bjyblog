@extends('layouts.home')

@section('title', '白俊遥博客,技术博客,个人博客模板, php博客系统')

@section('keywords', '个人博客系统,个人博客模板,thinkphp博客,php博客,技术博客,白俊遥')

@section('description', '白俊遥的php博客,个人技术博客,bjyblog,bjyadmin官方网站')

@section('content')
    {{--左侧开源项目开始--}}
    <div class="col-xs-12 col-md-12 col-lg-8 b-chat">
        {{--bjyadmin开始--}}
        <script src='http://git.oschina.net/shuaibai123/thinkphp-bjyadmin/widget_preview'></script>
        <style>
            .pro_name a{color: #4183c4;}
            .osc_git_title{background-color: #d8e5f1;}
            .osc_git_box{background-color: #fafafa;}
            .osc_git_box{border-color: #ddd;}
            .osc_git_info{color: #666;}
            .osc_git_main a{color: #4183c4;}
        </style>
        {{--bjyadmin结束--}}

        {{--bjyblog开始--}}
        <script src='http://git.oschina.net/shuaibai123/thinkbjy/widget_preview'></script>
        <style>
            .pro_name a{color: #4183c4;}
            .osc_git_title{background-color: #d8e5f1;}
            .osc_git_box{background-color: #fafafa;}
            .osc_git_box{border-color: #ddd;}
            .osc_git_info{color: #666;}
            .osc_git_main a{color: #4183c4;}
        </style>
        {{--bjyblog结束--}}

        {{--sublime开始--}}
        <script src='http://git.oschina.net/shuaibai123/sublime-thinkphp-bjy/widget_preview'></script>
        <style>
            .pro_name a{color: #4183c4;}
            .osc_git_title{background-color: #d8e5f1;}
            .osc_git_box{background-color: #fafafa;}
            .osc_git_box{border-color: #ddd;}
            .osc_git_info{color: #666;}
            .osc_git_main a{color: #4183c4;}
        </style>
        {{--sublime结束--}}

        {{--资源开始--}}
        <script src='http://git.oschina.net/shuaibai123/resources/widget_preview'></script>
        <style>
            .pro_name a{color: #4183c4;}
            .osc_git_title{background-color: #d8e5f1;}
            .osc_git_box{background-color: #fafafa;}
            .osc_git_box{border-color: #ddd;}
            .osc_git_info{color: #666;}
            .osc_git_main a{color: #4183c4;}
        </style>
        {{--资源结束--}}

        {{--github 上的项目--}}
        <div class="github-widget" data-repo="baijunyao/thinkphp-bjyadmin"></div>
        <div class="github-widget" data-repo="baijunyao/thinkphp-bjyblog"></div>
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