@extends('admin.layouts.admin')

@section('title', __('Social Links'))

@section('nav', __('Social Links'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>github：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="188" value="{{  $config['bjyblog.social_links.github'] }}" >
                </td>
            </tr>
            <tr>
                <th>gitee：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="189" value="{{  $config['bjyblog.social_links.gitee'] }}" >
                </td>
            </tr>
            <tr>
                <th>zhihu：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="190" value="{{  $config['bjyblog.social_links.zhihu'] }}" >
                </td>
            </tr>
            <tr>
                <th>weibo：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="191" value="{{  $config['bjyblog.social_links.weibo'] }}" >
                </td>
            </tr>
            <tr>
                <th>upyun：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="192" value="{{  $config['bjyblog.social_links.upyun'] }}" >
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
