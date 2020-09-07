@extends('layouts.admin')

@section('title', translate('Friendship Link List'))

@section('nav', translate('Friendship Link List'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/friendshipLink/index') }}">{{ translate('Friendship Link List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/friendshipLink/create') }}">{{ translate('Add Friendship Link') }}</a>
        </li>
    </ul>
    <form action="{{ url('admin/friendshipLink/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">{{ translate('Sort') }}</th>
                <th width="20%">{{ translate('Name') }}</th>
                <th width="40%">URL</th>
                <th width="5%">{{ translate('Status') }}</th>
                <th width="15%">{{ translate('Handle') }}</th>
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
                        <a href="{{ url('admin/friendshipLink/edit', [$v->id]) }}">{{ translate('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ translate('Delete') }}?')) location='{{ url('admin/friendshipLink/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/friendshipLink/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/friendshipLink/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Sort') }}">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
@endsection
