@extends('layouts.admin')

@section('title', '邮箱配置项')

@section('nav', '邮箱配置项')

@section('description', '邮箱配置项')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>邮箱服务器类型：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="154" value="{{  $config['email.driver'] }}" >
                </td>
            </tr>
            <tr>
                <th>加密方式：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="156" value="{{  $config['email.encryption'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱服务器端口：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="155" value="{{  $config['email.port'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱服务器地址：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="142" value="{{  $config['email.host'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱账号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="143" value="{{  $config['email.username'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱密码：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="144" value="{{  $config['email.password'] }}" >
                </td>
            </tr>
            <tr>
                <th>发件人名称：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="145" value="{{  $config['email.from.name'] }}" >
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
