@extends('layouts.admin')

@section('title', translate('Backup Config'))

@section('nav', translate('Backup Config'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Type') }}：</th>
                <td>
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="local" @if(in_array('local', $config['backup.backup.destination.disks'])) checked  @endif>{{ translate('Local') }}
                    &emsp;
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="oss_backups" @if(in_array('oss_backups', $config['backup.backup.destination.disks'])) checked  @endif>{{ translate('Aliyun') }} OSS
                </td>
            </tr>
            <tr>
                <th>{{ translate('Notification Email') }}：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="165" value="{{ $config['backup.notifications.mail.to'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('MySQL Dump Path') }}：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="159" value="{{ $config['database.connections.mysql.dump.dump_binary_path'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Aliyun') }} AccessKeyID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="160" value="{{ $config['filesystems.disks.oss_backups.access_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Aliyun') }} AccessKeySecret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="161" value="{{ $config['filesystems.disks.oss_backups.secret_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Aliyun') }} BUCKET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="162" value="{{ $config['filesystems.disks.oss_backups.bucket'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Aliyun') }} ENDPOINT：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="163" value="{{ $config['filesystems.disks.oss_backups.endpoint'] }}" >
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
