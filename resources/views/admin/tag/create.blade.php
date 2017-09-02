@extends('layouts.admin')

@section('title', '添加标签')

@section('nav', '添加标签')

@section('description', '添加新的标签')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/tag/index') }}">标签列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/tag/create') }}">添加标签</a>
        </li>
    </ul>
    <form class="form-inline" action="{{ url('admin/tag/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>标签名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
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
