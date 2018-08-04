@extends('layouts.admin')

@section('title', '菜单列表')

@section('nav', '菜单列表')

@section('description', '博客菜单')

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/nav/index') }}">菜单列表</a>
        </li>
        <li>
            <a href="{{ url('admin/nav/create') }}">新增菜单</a>
        </li>
    </ul>
    <form action="{{ url('admin/nav/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">排序</th>
                <th width="20%">菜单名</th>
                <th width="40%">url</th>
                <th width="5%">状态</th>
                <th width="15%">操作</th>
            </tr>
            @foreach($nav as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>
                        <input class="form-control" type="text" name="{{ $v->id }}" value="{{ $v->sort }}">
                    </td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->url }}</td>
                    <td>
                        @if(is_null($v->deleted_at))
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/nav/edit', [$v->id]) }}">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('确定要删除吗?')) location='{{ url('admin/nav/destroy', [$v->id]) }}'">删除</a>
                        @else
                            <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/nav/restore', [$v->id]) }}'">恢复</a>
                            |
                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/nav/forceDelete', [$v->id]) }}'">彻底删除</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-success" type="submit" value="排序">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
@endsection
