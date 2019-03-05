@extends('layouts.admin')

@section('title', '编辑友情链接')

@section('nav', '编辑友情链接')

@section('description', '编辑新的友情链接')

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/friendshipLink/index') }}">友情链接列表</a>
        </li>
        <li class="active">
            <a href="">编辑友情链接</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/friendshipLink/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>名称</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>
            <tr>
                <th>链接</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $data->url }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $data->sort }}">
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
