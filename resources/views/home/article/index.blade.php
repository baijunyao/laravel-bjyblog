@extends('layouts.home')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)

@section('css')
    <link rel="stylesheet" href="{{ asset('statics/prism/prism.min.css') }}" />
@endsection

@section('content')
    <!-- 左侧文章开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <div class="row b-article">
            <h1 class="col-xs-12 col-md-12 col-lg-12 b-title">{{ $data->title }}</h1>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <ul class="row b-metadata">
                    <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> {{ $data->author }}</li>
                    <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> {{ $data->created_at }}</li>
                    <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="{:U('Home/Index/category',array('cid'=>$v['cid']))}">{{ $data->category_name }}</a>
                    <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                        @foreach($data->tag as $v)
                            <a class="b-tag-name" href="{:U('Home/Index/tag',array('tid'=>$v['tid']))}">{{ $v->name }}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
                <div class="js-content">{!! $data->content !!}</div>
                <eq name="article['current']['is_original']" value="1">
                    <p class="b-h-20"></p>
                    <p class="b-copyright">
                        {{ $config['COPYRIGHT_WORD'] }}
                    </p>
                </eq>
                <ul class="b-prev-next">
                    <li class="b-prev">
                        上一篇：
                        <empty name="article['prev']">
                            <span>没有了</span>
                            <else />
                            <a href="{$article['prev']['url']}">{$article['prev']['title']}</a>
                        </empty>
                    </li>
                    <li class="b-next">
                        下一篇：
                        <empty name="article['next']">
                            <span>没有了</span>
                            <else />
                            <a href="{$article['next']['url']}">{$article['next']['title']}</a>
                        </empty>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 引入通用评论开始 -->
        <include file="Public/public_comment" />
        <!-- 引入通用评论结束 -->
    </div>
    <!-- 左侧文章结束 -->
@endsection

@section('js')

    <script src="{{ asset('statics/prism/prism.min.js') }}"></script>
    <script src="{{ asset('statics/editormd/lib/marked.min.js') }}"></script>
    <script>
        // 获取文章内容
        var articleMarkdown = $('.js-content').text();
        marked.setOptions({
            sanitize: true,
            gfm: true,
            gfmBreaks: true
        })
        // markdown 转 html
        var articleHtml = marked(articleMarkdown);
//        articleHtml = articleHtml.replace(/\n/g," <br />\n");
        $('.js-content').html(articleHtml);
        $.each($('.js-content p'), function (index, val) {
            var html = $(val).html();
            $(val).html(html.replace(/\n/g," <br />\n"));
        })
        // 添加行数
        $('pre').addClass('line-numbers');
        // 新页面跳转
        $('.js-content a').attr('target', '_blank')
    </script>

@endsection