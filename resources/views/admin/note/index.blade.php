@extends('layouts.admin')

@section('title', translate('Note List'))

@section('nav', translate('Note List'))

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/note/index') }}">{{ translate('Note List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/note/create') }}">{{ translate('Add Note') }}</a>
        </li>
    </ul>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th width="65%">{{ translate('Content') }}</th>
            <th width="15%">{{ translate('Date') }}</th>
            <th width="5%">{{ translate('Status') }}</th>
            <th width="10%">{{ translate('Handle') }}</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->content }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>
                    <a href="{{ url('admin/note/edit', [$v->id]) }}">{{ translate('Edit') }}</a>
                    |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ translate('Delete') }}?'))location.href='{{ url('admin/note/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/note/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/note/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
