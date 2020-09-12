@extends('layouts.admin')

@section('title', translate('Administrator List'))

@section('nav', translate('Administrator List'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th>{{ translate('Name Name') }}</th>
            <th>{{ translate('Email') }}</th>
            <th width="15%">{{ translate('Date') }}</th>
            <th width="10%">{{ translate('Handle') }}</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ url('admin/user/edit', [$v->id]) }}">{{ translate('Edit') }}</a> |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ translate('Delete') }}?')) location='{{ url('admin/user/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/user/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/user/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
