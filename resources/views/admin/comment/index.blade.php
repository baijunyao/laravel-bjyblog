@extends('layouts.admin')

@section('title', '评论列表')

@section('nav', '评论列表')

@section('description', '文章评论')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th width="40%">评论内容</th>
            <th width="25%">文章</th>
            <th width="10%">用户</th>
            <th width="15%">评论日期</th>
            <th width="5%">操作</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{!! htmlspecialchars_decode($v->content) !!}</td>
                <td>
                    <a href="{{ url('article', [$v->article_id]) }}#comment-{{ $v->id }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="javascript:if(confirm('确认删除?'))location.href='{{ url('admin/comment/destroy', [$v->id]) }}'">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links() }}
    </div>
@endsection
