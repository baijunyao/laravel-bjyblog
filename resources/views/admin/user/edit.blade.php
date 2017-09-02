@extends('layouts.admin')

@section('title', '编辑管理员')

@section('nav', '编辑管理员')

@section('description', '编辑或者查看管理员详情')

@section('content')
    <form class="form-inline" action="{{ url('admin/user/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>用户名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>
            <tr>
                <th>邮箱</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}">
                </td>
            </tr>
            <tr>
                <th>密码</th>
                <td>
                    <input class="form-control" type="text" name="password">
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
