@extends('admin.layouts.admin')

@section('title', __('Comment Audit'))

@section('nav', __('Comment Audit'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Comment Audit') }}：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="173" value="true" @if(Str::isTrue($config['bjyblog.comment_audit'])) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="173" value="false" @if(Str::isFalse($config['bjyblog.comment_audit'])) checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ __('Baidu appid') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="174" value="{{  $config['services.baidu.appid'] }}" >
                </td>
            </tr>

            <tr>
                <th>{{ __('Baidu appkey') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="175" value="{{  $config['services.baidu.appkey'] }}" >
                </td>
            </tr>

            <tr>
                <th>{{ __('Baidu secret') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="176" value="{{  $config['services.baidu.secret'] }}" >
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
