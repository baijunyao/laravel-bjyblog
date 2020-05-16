@extends('admin.layouts.admin')

@section('title', __('Socialite Config'))

@section('nav', __('Socialite Config'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>QQ APP ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="120" value="{{  $config['services.qq.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ APP KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="126" value="{{  $config['services.qq.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Weibo') }} API KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="133" value="{{  $config['services.weibo.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Weibo') }} SECRET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="134" value="{{  $config['services.weibo.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>Github Client ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="139" value="{{  $config['services.github.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>Github Client Secret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="140" value="{{  $config['services.github.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ __('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection
