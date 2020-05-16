@extends('blueberry.layouts.home')

@section('title', $title)

@section('keywords', config('bjyblog.head.keywords'))

@section('description', config('bjyblog.head.description'))

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
    <div class="col-xs-12 col-md-12 col-lg-8">
        @if(Str::isTrue(config('bjyblog.breadcrumb')))
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 b-breadcrumb">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
        @endif
        <div class="row b-chat">
            <div class="col-xs-12 col-md-12 col-lg-12 b-breadcrumb">
                @foreach($openSource as $v)
                    @if($v->type == 1)
                        <div class="github-widget" data-repo="{{ $v->name }}"></div>
                    @elseif($v->type == 2)
                        <script src='//gitee.com/{{ $v->name }}/widget_preview'></script>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{--左侧开源项目结束--}}
@endsection

@section('js')
    {{--githuh widget--}}
    <script src="{{ asset('statics/js/jquery.githubRepoWidget.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.osc_git_box a,.github-widget a').attr('target', "{{ config('bjyblog.link_target') }}");
        })
    </script>
@endsection
