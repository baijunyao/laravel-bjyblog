@extends('admin.layouts.admin')

@section('title', __('Administrator List'))

@section('nav', __('Administrator List'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th>{{ __('Name Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th width="15%">{{ __('Date') }}</th>
            <th width="10%">{{ __('Handle') }}</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ url('admin/user/edit', [$v->id]) }}">{{ __('Edit') }}</a> |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ __('Delete') }}?')) location='{{ url('admin/user/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/user/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/user/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
