@extends('admin.layouts.admin')

@section('title', __('Add Tag'))

@section('nav', __('Add Tag'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/tag/index') }}">{{ __('Tag List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/tag/create') }}">{{ __('Add Tag') }}</a>
        </li>
    </ul>
    <form class="form-inline" action="{{ url('admin/tag/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Tag Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Keywords') }}</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ old('keywords') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
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
