@extends('layouts.admin')

@section('title', '备份配置')

@section('nav', '备份配置')

@section('description', '备份配置')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>mysqldump所在目录：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="159" value="{{  $config['database.connections.mysql.dump.dump_binary_path'] }}" >
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
