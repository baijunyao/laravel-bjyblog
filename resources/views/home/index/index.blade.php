@extends('layouts.home')

@section('title', '白俊遥博客,技术博客,个人博客模板, php博客系统')

@section('keywords', '个人博客系统,个人博客模板,thinkphp博客,php博客,技术博客,白俊遥')

@section('description', '白俊遥的php博客,个人技术博客,bjyblog,bjyadmin官方网站')

@section('content')
    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <notempty name="title_word">
            <div class="row b-tag-title">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>{$title_word}</h2>
                </div>
            </div>
        </notempty>
        <!-- 循环文章列表开始 -->
        <foreach name="articles" item="v">
            <div class="row b-one-article">
                <h3 class="col-xs-12 col-md-12 col-lg-12">
                    <a class="b-oa-title" href="{$v['url']}" target="_blank" onclick="return recordId('{$v['extend']['type']}',{$v['extend']['id']})">{$v['title']}</a>
                </h3>
                <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                    <ul class="row">
                        <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> {$v['author']}</li>
                        <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> {$v['addtime']}</li>
                        <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="{:U('Home/Index/category',array('cid'=>$v['cid']))}" target="_blank">{$v['category']['cname']}</a>
                        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                            <foreach name="v['tag']" item="n">
                                <a class="b-tag-name" href="{:U('Home/Index/tag',array('tid'=>$n['tid']))}" target="_blank">{$n['tname']}</a>
                            </foreach>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- 文章封面图片开始 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                            <figure class="b-oa-pic b-style1">
                                <a href="{$v['url']}" target="_blank">
                                    <img src="{$v['pic_path']}" alt="{$Think.config.IMAGE_TITLE_ALT_WORD}" title="{$Think.config.IMAGE_TITLE_ALT_WORD}">
                                </a>
                                <figcaption>
                                    <a href="{$v['url']}" target="_blank"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- 文章封面图片结束 -->

                        <!-- 文章描述开始 -->
                        <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                            {$v['description']}
                        </div>
                        <!-- 文章描述结束 -->
                    </div>
                </div>
                <a class=" b-readall" href="{$v['url']}" target="_blank">阅读全文</a>
            </div>
        </foreach>
        <!-- 循环文章列表结束 -->

        <!-- 列表分页开始 -->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 b-page">
                {$page}
            </div>
        </div>
        <!-- 列表分页结束 -->
    </div>
    <!-- 左侧列表结束 -->
@endsection