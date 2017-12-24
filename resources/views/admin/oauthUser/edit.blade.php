@extends('layouts.admin')

@section('title', '编辑第三方用户')

@section('css')
    <!-- Switchery -->
    <link href="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('nav', '编辑第三方用户')

@section('description', '编辑或者查看第三方用户详情')

@section('content')
    <form class="form-inline" action="{{ url('admin/oauthUser/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>类型</th>
                <td>
                    @if($data->type == 1)QQ @endif
                    @if($data->type == 2)新浪微博 @endif
                    @if($data->type == 3)github @endif
                </td>
            </tr>
            <tr>
                <th>邮箱</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}">
                </td>
            </tr>
            <tr>
                <th>用户名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>

            <tr>
                <th>是否是管理员</th>
                <td>
                    <input type="checkbox" class="js-switch" name="is_admin" value="1" @if($data->is_admin == 1) checked @endif />
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

@section('js')
    <!-- Switchery -->
    <script src="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.js') }}"></script>
@endsection