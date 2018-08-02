@extends('layouts.admin')

@section('title', '编辑菜单')

@section('nav', '编辑菜单')

@section('description', '编辑菜单')

@section('content')
    <form class="form-horizontal " action="{{ url('admin/nav/update', [$nav->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>菜单名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $nav->name }}">
                </td>
            </tr>
            <tr>
                <th>链接</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $nav->url }}">
                </td>
            </tr>
            <tr>
                <th>排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $nav->sort }}">
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
