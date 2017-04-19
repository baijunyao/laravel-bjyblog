@extends('layouts.admin')

@section('title', '管理员列表')

@section('nav', '管理员列表')

@section('description', '博客管理员')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>用户名</th>
            <th>邮箱</th>
            <th>创建日期</th>
            <th>编辑</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->created_at }}</td>
                <td>{{ url('admin/user/edit', [$v->id]) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
