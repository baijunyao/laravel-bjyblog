@extends('admin.layouts.admin')

@section('title', __('Upload'))

@section('nav', __('Upload'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Type') }}：</th>
                <td>
                    <input class="bjy-icheck" type="checkbox" name="204[]" value="public" @if(in_array('public', $config['bjyblog.upload_disks'])) checked  @endif>{{ __('Local') }}
                    &emsp;
                    <input class="bjy-icheck" type="checkbox" name="204[]" value="oss_uploads" @if(in_array('oss_uploads', $config['bjyblog.upload_disks'])) checked  @endif>{{ __('Aliyun') }} OSS
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} AccessKeyID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="200" value="{{ $config['filesystems.disks.oss_uploads.access_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} AccessKeySecret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="201" value="{{ $config['filesystems.disks.oss_uploads.secret_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} BUCKET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="202" value="{{ $config['filesystems.disks.oss_uploads.bucket'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} ENDPOINT：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="203" value="{{ $config['filesystems.disks.oss_uploads.endpoint'] }}" >
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
