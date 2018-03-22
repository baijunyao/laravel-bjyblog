@extends('layouts.admin')

@section('title', '文章列表')

@section('nav', '文章列表')

@section('description', '已发布的文章列表')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/article/index') }}">文章列表</a>
        </li>
        <li>
            <a href="{{ url('admin/article/create') }}">发布文章</a>
        </li>
    </ul>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>文章id</th>
            <th>分类</th>
            <th>标题</th>
            <th>点击数</th>
            <th>状态</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        @foreach($article as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->category->name }}</td>
                <td>
                    <a href="{{ url('article', [$v->id]) }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td>{{ $v->click }}</td>
                <td>
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ url('admin/article/edit', [$v->id]) }}">编辑</a>
                    |
                    @if($v->trashed())
                        <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/article/restore', [$v->id]) }}'">恢复</a>
                        |
                        <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/article/forceDelete', [$v->id]) }}'">彻底删除</a>
                    @else
                        <a href="javascript:if(confirm('确认删除?'))location.href='{{ url('admin/article/destroy', [$v->id]) }}'">删除</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $article->links() }}
    </div>

@endsection
