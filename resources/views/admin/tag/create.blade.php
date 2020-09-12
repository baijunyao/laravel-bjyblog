@extends('layouts.admin')

@section('title', translate('Add Tag'))

@section('nav', translate('Add Tag'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/tag/index') }}">{{ translate('Tag List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/tag/create') }}">{{ translate('Add Tag') }}</a>
        </li>
    </ul>
    <form class="form-inline" action="{{ url('admin/tag/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Tag Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Keywords') }}</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ old('keywords') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
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
