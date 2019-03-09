@extends('layouts.admin')

@section('title', __('Article List'))

@section('nav', __('Article List'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/article/index') }}">{{ __('Article List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/article/create') }}">{{ __('Add Article') }}</a>
        </li>
    </ul>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Click Counts') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Created_at') }}</th>
            <th>{{ __('Handle') }}</th>
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
                    <a href="{{ url('admin/article/edit', [$v->id]) }}">{{ __('Edit') }}</a>
                    |
                    @if($v->trashed())
                        <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/article/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/article/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ __('Delete') }}?'))location.href='{{ url('admin/article/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $article->links('vendor.pagination.bjypage') }}
    </div>

@endsection
