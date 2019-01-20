@extends('layouts.admin')

@section('title', '批量替换评论')

@section('nav', '批量替换评论')

@section('description', '批量替换评论')

@section('content')
    <form class="form-inline" action="{{ url('admin/comment/replace') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>需要替换的关键词</th>
                <td>
                    <input class="form-control" type="text" name="search" value="{{ old('search') }}">
                </td>
            </tr>
            <tr>
                <th>替换成</th>
                <td>
                    <input class="form-control" type="text" name="replace" value="{{ old('replace') }}">
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
