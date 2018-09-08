@extends('layouts.admin')

@section('title', '编辑推荐博客')

@section('nav', '编辑推荐博客')

@section('description', '编辑新的推荐博客')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/site/index') }}">推荐博客列表</a>
        </li>
        <li class="active">
            <a href="">编辑推荐博客</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/site/update', [$site->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>名称</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $site->name }}">
                </td>
            </tr>
            <tr>
                <th>链接</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $site->url }}">
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $site->description }}">
                </td>
            </tr>
            <tr>
                <th>排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $site->sort }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>

@endsection
