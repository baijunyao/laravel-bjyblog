@extends('layouts.admin')

@section('title', '开源项目列表')

@section('nav', '开源项目列表')

@section('description', '博客开源项目')

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/gitProject/index') }}">开源项目列表</a>
        </li>
        <li>
            <a href="{{ url('admin/gitProject/create') }}">新增开源</a>
        </li>
    </ul>
    <form action="{{ url('admin/gitProject/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">{{ __('Sort') }}</th>
                <th width="20%">项目</th>
                <th width="40%">类型</th>
                <th width="5%">{{ __('Status') }}</th>
                <th width="15%">{{ __('Handle') }}</th>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>
                        <input class="form-control" type="text" name="{{ $v->id }}" value="{{ $v->sort }}">
                    </td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $gitProjectType[$v->type] }}</td>
                    <td>
                        @if(is_null($v->deleted_at))
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/gitProject/edit', [$v->id]) }}">{{ __('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ __('Delete') }}?')) location='{{ url('admin/gitProject/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/gitProject/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/gitProject/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ __('Sort') }}">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
@endsection
