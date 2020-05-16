@extends('admin.layouts.admin')

@section('title', __('Tag List'))

@section('nav', __('Tag List'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/tag/index') }}">{{ __('Tag List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/tag/create') }}">{{ __('Add Tag') }}</a>
        </li>
    </ul>
    <form action="{{ url('admin/tag/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>{{ __('Tag Name') }}</th>
                <td>{{ __('Status') }}</td>
                <th>{{ __('Handle') }}</th>
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
                        <a href="{{ url('admin/tag/edit', [$v->id]) }}">{{ __('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ __('Delete') }}?')) location='{{ url('admin/tag/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/tag/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/tag/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

@endsection
