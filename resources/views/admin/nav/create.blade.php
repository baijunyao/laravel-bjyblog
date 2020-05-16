@extends('admin.layouts.admin')

@section('title', __('Add Nav'))

@section('nav', __('Add Nav'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/nav/index') }}">{{ __('Nav List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/nav/create') }}">{{ __('Add Nav') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/nav/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Nav Name') }}</th>
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
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort') }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ __('Submit') }}">
                </td>
            </tr>
        </table>
    </form>

@endsection
