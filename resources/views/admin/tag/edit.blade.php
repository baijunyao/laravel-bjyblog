@extends('layouts.admin')

@section('title', '编辑标签')

@section('nav', '编辑标签')

@section('description', '编辑新的标签')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/tag/index') }}">标签列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/tag/create') }}">编辑标签</a>
        </li>
    </ul>
    <form class="form-inline" action="{{ url('admin/tag/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>标签名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data['name'] }}">
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
