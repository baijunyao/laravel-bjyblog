@extends('layouts.admin')

@section('title', '评论列表')

@section('nav', '评论列表')

@section('description', '文章评论')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>评论内容</th>
            <th>文章</th>
            <th>用户</th>
            <th>评论日期</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{!! htmlspecialchars_decode($v->content) !!}</td>
                <td>
                    <a href="{{ url('article', ['article' => $v->article_id]) }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->created_at }}</td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links() }}
    </div>
@endsection
