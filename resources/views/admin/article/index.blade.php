@extends('layouts.admin')

@section('title', translate('Article List'))

@section('nav', translate('Article List'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/article/index') }}">{{ translate('Article List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/article/create') }}">{{ translate('Add Article') }}</a>
        </li>
    </ul>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>{{ translate('Category') }}</th>
            <th>{{ translate('Title') }}</th>
            <th>{{ translate('Click Counts') }}</th>
            <th>{{ translate('Status') }}</th>
            <th>{{ translate('Created_at') }}</th>
            <th>{{ translate('Handle') }}</th>
        </tr>
        @foreach($article as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->category->name }}</td>
                <td>
                    <a href="{{ url('article', [$v->id]) }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td>{{ $v->views }}</td>
                <td>
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ url('admin/article/edit', [$v->id]) }}">{{ translate('Edit') }}</a>
                    |
                    @if($v->trashed())
                        <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/article/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/article/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ translate('Delete') }}?'))location.href='{{ url('admin/article/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $article->links('vendor.pagination.bjypage') }}
    </div>

@endsection
