@extends('admin.layouts.admin')

@section('title', __('Edit Category'))

@section('nav', __('Edit Category'))

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/category/index') }}">{{ __('Category List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/category/create') }}">{{ __('Edit Category') }}</a>
        </li>
    </ul>

    <form class="form-horizontal " action="{{ url('admin/category/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Category Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data['name'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Keywords') }}</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ $data['keywords'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $data['description'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $data['sort'] }}">
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
