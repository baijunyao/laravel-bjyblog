@extends('layouts.admin')

@section('title', '标签列表')

@section('nav', '标签列表')

@section('description', '博客标签')

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/tag/index') }}">标签列表</a>
        </li>
        <li>
            <a href="{{ url('admin/tag/create') }}">添加标签</a>
        </li>
    </ul>
    <form action="{{ url('admin/tag/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>标签名</th>
                <td>状态</td>
                <th>操作</th>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>
                        @if(is_null($v->deleted_at))
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/tag/edit', [$v->id]) }}">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('确定要删除吗?')) location='{{ url('admin/tag/destroy', [$v->id]) }}'">删除</a>
                        @else
                            <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/tag/restore', [$v->id]) }}'">恢复</a>
                            |
                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/tag/forceDelete', [$v->id]) }}'">彻底删除</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

@endsection
