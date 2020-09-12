@extends('layouts.admin')

@section('title', translate('Add Friendship Link'))

@section('nav', translate('Add Friendship Link'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/friendshipLink/index') }}">{{ translate('Friendship Link List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/friendshipLink/create') }}">{{ translate('Add Friendship Link') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/friendshipLink/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th>URL</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ old('url') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort') }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Submit') }}">
                </td>
            </tr>
        </table>
    </form>

@endsection
