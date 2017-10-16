@extends('layouts.admin')

@section('title', '分类列表')

@section('nav', '分类列表')

@section('description', '博客分类')

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/category/index') }}">分类列表</a>
        </li>
        <li>
            <a href="{{ url('admin/category/create') }}">添加分类</a>
        </li>
    </ul>
    <form action="{{ url('admin/category/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>排序</th>
                <th>分类名</th>
                <th>关键字</th>
                <th>描述</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td width="5%">
                        <input class="form-control" type="text" name="{{ $v->id }}" value="{{ $v->sort }}">
                    </td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->keywords }}</td>
                    <td>{{ $v->description }}</td>
                    <td>
                        @if(is_null($v->deleted_at))
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/category/edit', [$v->id]) }}">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('确定要删除吗?')) location='{{ url('admin/category/destroy', [$v->id]) }}'">删除</a>
                        @else
                            <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/category/restore', [$v->id]) }}'">恢复</a>
                            |
                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/category/forceDelete', [$v->id]) }}'">彻底删除</a>
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
                <td></td>
            </tr>
        </table>
    </form>
@endsection
