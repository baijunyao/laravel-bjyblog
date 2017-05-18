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
                <th width="5%">id</th>
                <th width="55%">标签名</th>
                <th width="40%">操作</th>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>
                        <a href="{{ url('admin/tag/edit', [$v->id]) }}">编辑</a> |
                        <a href="javascript:if(confirm('确定要删除吗?')) location='{{ url('admin/tag/destroy', [$v->id]) }}'">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

@endsection
