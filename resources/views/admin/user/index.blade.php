@extends('layouts.admin')

@section('title', '管理员列表')

@section('nav', '管理员列表')

@section('description', '博客管理员')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th width="15%">创建日期</th>
            <th width="10%">操作</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->created_at }}</td>
                <td><a href="{{ url('admin/user/edit', [$v->id]) }}">编辑</a></td>
            </tr>
        @endforeach
    </table>
@endsection
