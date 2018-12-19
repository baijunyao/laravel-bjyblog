@extends('layouts.admin')

@section('title', '备份配置')

@section('nav', '备份配置')

@section('description', '备份配置')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>备份方案：</th>
                <td>
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="local" @if(in_array('local', config('backup.backup.destination.disks'))) checked  @endif>本地
                    &emsp;
                    <input class="bjy-icheck" type="checkbox" name="164[]" value="oss" @if(in_array('oss', config('backup.backup.destination.disks'))) checked  @endif>阿里云oss
                </td>
            </tr>
            <tr>
                <th>接收通知的邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="165" value="{{ $config['backup.notifications.mail.to'] }}" >
                </td>
            </tr>
            <tr>
                <th>mysqldump所在目录：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="159" value="{{ $config['database.connections.mysql.dump.dump_binary_path'] }}" >
                </td>
            </tr>
            <tr>
                <th>阿里云AccessKeyID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="160" value="{{ $config['filesystems.disks.oss.access_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>阿里云AccessKeySecret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="161" value="{{ $config['filesystems.disks.oss.access_key'] }}" >
                </td>
            </tr>
            <tr>
                <th>阿里云BUCKET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="162" value="{{ $config['filesystems.disks.oss.bucket'] }}" >
                </td>
            </tr>
            <tr>
                <th>阿里云ENDPOINT：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="163" value="{{ $config['filesystems.disks.oss.endpoint'] }}" >
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
