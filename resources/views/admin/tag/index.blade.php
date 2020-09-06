@extends('layouts.admin')

@section('title', translate('Tag List'))

@section('nav', translate('Tag List'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/tag/index') }}">{{ translate('Tag List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/tag/create') }}">{{ translate('Add Tag') }}</a>
        </li>
    </ul>
    <form action="{{ url('admin/tag/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>{{ translate('Tag Name') }}</th>
                <td>{{ translate('Status') }}</td>
                <th>{{ translate('Handle') }}</th>
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
                        <a href="{{ url('admin/tag/edit', [$v->id]) }}">{{ translate('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ translate('Delete') }}?')) location='{{ url('admin/tag/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/tag/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/tag/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

@endsection
