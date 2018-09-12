@extends('layouts.admin')

@section('title', '推荐博客列表')

@section('nav', '推荐博客列表')

@section('description', '博客推荐博客')

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/site/index') }}">推荐博客列表</a>
        </li>
        <li>
            <a href="{{ url('admin/site/create') }}">添加推荐博客</a>
        </li>
    </ul>
    <form action="{{ url('admin/site/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">排序</th>
                <th width="10%">名称</th>
                <th width="10%">链接</th>
                <th width="40%">描述</th>
                <th width="5%">状态</th>
                <th width="15%">操作</th>
            </tr>
            @foreach($site as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>
                        <input class="form-control" type="text" name="{{ $v->id }}" value="{{ $v->sort }}">
                    </td>
                    <td>{{ $v->name }}</td>
                    <td><a href="{{ $v->url }}" target="_blank">{{ $v->url }}</a></td>
                    <td>{{ $v->description }}</td>
                    <td>
                        @if($v->audit == 1)
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        @if($v->audit == 1)
                            <a class="js-audit" href="javascript:;" data-id="{{ $v->id }}" data-audit="0">取消审核</a>
                        @else
                            <a class="js-audit" href="javascript:;" data-id="{{ $v->id }}" data-audit="1">通过审核</a>
                        @endif
                        |
                        <a href="{{ url('admin/site/edit', [$v->id]) }}">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('确定要删除吗?')) location='{{ url('admin/site/destroy', [$v->id]) }}'">删除</a>
                        @else
                            <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/site/restore', [$v->id]) }}'">恢复</a>
                            |
                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/site/forceDelete', [$v->id]) }}'">彻底删除</a>
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

@section('js')
    <script>
        $('.js-audit').click(function () {
            if (!confirm('确定操作?')) {
                return false;
            }
            var id = $(this).attr('data-id');
            var url = '{{ url('admin/site/update') }}' + '/' + id;
            var postData = {
                audit: $(this).attr('data-audit')
            }
            $.post(url, postData, function () {
                location.reload();
            })
        })
    </script>
@endsection