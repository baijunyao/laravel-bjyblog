@extends('admin.layouts.admin')

@section('title', __('Friendship Link List'))

@section('nav', __('Friendship Link List'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/friendshipLink/index') }}">{{ __('Friendship Link List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/friendshipLink/create') }}">{{ __('Add Friendship Link') }}</a>
        </li>
    </ul>
    <form action="{{ url('admin/friendshipLink/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">{{ __('Sort') }}</th>
                <th width="20%">{{ __('Name') }}</th>
                <th width="40%">URL</th>
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
                    <td><a href="{{ $v->url }}" target="_blank">{{ $v->url }}</a></td>
                    <td>
                        @if(is_null($v->deleted_at))
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/friendshipLink/edit', [$v->id]) }}">{{ __('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ __('Delete') }}?')) location='{{ url('admin/friendshipLink/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/friendshipLink/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/friendshipLink/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
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
