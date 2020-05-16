@extends('admin.layouts.admin')

@section('title', __('Backup Config'))

@section('nav', __('Backup Config'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Type') }}：</th>
                <td>
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="local" @if(in_array('local', $config['backup.backup.destination.disks'])) checked  @endif>{{ __('Local') }}
                    &emsp;
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="oss" @if(in_array('oss', $config['backup.backup.destination.disks'])) checked  @endif>{{ __('Aliyun') }} OSS
                </td>
            </tr>
            <tr>
                <th>{{ __('Notification Email') }}：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="165" value="{{ $config['backup.notifications.mail.to'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('MySQL Dump Path') }}：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="159" value="{{ $config['database.connections.mysql.dump.dump_binary_path'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} AccessKeyID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="160" value="{{ $config['filesystems.disks.oss.access_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} AccessKeySecret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="161" value="{{ $config['filesystems.disks.oss.secret_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} BUCKET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="162" value="{{ $config['filesystems.disks.oss.bucket'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Aliyun') }} ENDPOINT：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="163" value="{{ $config['filesystems.disks.oss.endpoint'] }}" >
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
