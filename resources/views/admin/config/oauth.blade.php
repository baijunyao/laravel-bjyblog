@extends('layouts.admin')

@section('title', '邮箱配置项')

@section('nav', '邮箱配置项')

@section('description', '邮箱配置项')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>QQ登录APP ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="120" value="{{  $config['services.qq.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ登录APP KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="126" value="{{  $config['services.qq.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录API KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="133" value="{{  $config['services.weibo.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录SECRET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="134" value="{{  $config['services.weibo.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="139" value="{{  $config['services.github.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client Secret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="140" value="{{  $config['services.github.client_secret'] }}" >
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
