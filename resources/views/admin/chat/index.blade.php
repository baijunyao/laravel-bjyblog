@extends('layouts.admin')

@section('title', __('Chat List'))

@section('nav', __('Chat List'))

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/chat/index') }}">{{ __('Chat List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/chat/create') }}">{{ __('Add Chat') }}</a>
        </li>
    </ul>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th width="65%">{{ __('Content') }}</th>
            <th width="15%">{{ __('Date') }}</th>
            <th width="5%">{{ __('Status') }}</th>
            <th width="10%">{{ __('Handle') }}</th>
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
                    <a href="{{ url('admin/chat/edit', [$v->id]) }}">{{ __('Edit') }}</a>
                    |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ __('Delete') }}?'))location.href='{{ url('admin/chat/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/chat/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/chat/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
