@extends('layouts.admin')

@section('title', translate('Comment Audit'))

@section('nav', translate('Comment Audit'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Comment Audit') }}：</th>
                <td>
                    {{ translate('Yes') }} <input class="bjy-icheck" type="radio" name="173" value="true" @if(Str::isTrue($config['bjyblog.comment_audit'])) checked @endif> &emsp;&emsp;
                    {{ translate('No') }} <input class="bjy-icheck" type="radio" name="173" value="false" @if(Str::isFalse($config['bjyblog.comment_audit'])) checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ translate('Baidu appid') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="174" value="{{  $config['services.baidu.appid'] }}" >
                </td>
            </tr>

            <tr>
                <th>{{ translate('Baidu appkey') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="175" value="{{  $config['services.baidu.appkey'] }}" >
                </td>
            </tr>

            <tr>
                <th>{{ translate('Baidu secret') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="176" value="{{  $config['services.baidu.secret'] }}" >
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection
