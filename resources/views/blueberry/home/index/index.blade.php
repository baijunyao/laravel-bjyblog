@extends('blueberry.layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

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

        @if(Str::isFalse(config('bjyblog.breadcrumb')) && !empty($tagName))
            <div class="row b-tag-title">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>{!! __('others.article_with_tag', ['tag' => $tagName]) !!}</h2>
                </div>
            </div>
        @endif

        @if(Str::isFalse(config('bjyblog.breadcrumb')) && request()->has('wd'))
            <div class="row b-tag-title">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>{!! __('others.search_article', ['word' => clean(request()->input('wd'))]) !!}</h2>
                </div>
            </div>
        @endif
        <!-- 循环文章列表开始 -->
        @foreach($articles as $k => $v)
            <div class="row b-one-article">
                <h3 class="col-xs-12 col-md-12 col-lg-12">
                    <a class="b-oa-title" href="{{ $v->url }}" target="{{ config('bjyblog.link_target') }}">{{ $v->title }}</a>
                </h3>
                <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                    <ul class="row">
                        <li class="col-xs-5 col-md-2 col-lg-3">
                            <i class="fa fa-user"></i> {{ $v->author }}
                        </li>
                        <li class="col-xs-7 col-md-3 col-lg-3">
                            <i class="fa fa-calendar"></i> {{ $v->created_at }}
                        </li>
                        <li class="col-xs-5 col-md-2 col-lg-2">
                            <i class="fa fa-list-alt"></i> <a href="{{ $v->category->url }}" target="{{ config('bjyblog.link_target') }}">{{ $v->category->name }}</a>
                        </li>
                        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                            @foreach($v->tags as $n)
                                <a class="b-tag-name" href="{{ $n->url }}" target="{{ config('bjyblog.link_target') }}">{{ $n->name }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- 文章封面图片开始 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs b-oa-thumbnail">
                            <figure class="b-oa-pic b-style1">
                                <a href="{{ $v->url }}" target="{{ config('bjyblog.link_target') }}">
                                    <img class="bjy-lazyload" src="{{ cdn_url('/images/home/loading.gif') }}" data-src="{{ cdn_url($v->cover)  }}" alt="{{ config('bjyblog.alt_word') }}" title="{{ config('bjyblog.alt_word') }}">
                                </a>
                                <figcaption>
                                    <a href="{{ url('article', [$v->id]) }}" target="{{ config('bjyblog.link_target') }}"></a>
                                </figcaption>
                            </figure>
                            @if(1 == $v->is_top)
                                <img class="b-top-icon" src="{{ cdn_url('/images/home/top.png')  }}" alt="top">
                            @endif
                        </div>
                        <!-- 文章封面图片结束 -->

                        <!-- 文章描述开始 -->
                        <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                            {{ $v->description }}
                        </div>
                        <!-- 文章描述结束 -->
                    </div>
                </div>
                <a class=" b-readall" href="{{ $v->url }}" target="{{ config('bjyblog.link_target') }}">{{ __('Read More') }}</a>
            </div>
        @endforeach
        <!-- 循环文章列表结束 -->

        <!-- 列表分页开始 -->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 b-page text-center">
                {{ $articles->appends(['wd' => request()->input('wd')])->links('blueberry.vendor.pagination.bjypage') }}
            </div>
        </div>
        <!-- 列表分页结束 -->
    </div>
    <!-- 左侧列表结束 -->
@endsection
