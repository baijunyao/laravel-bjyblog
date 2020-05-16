@extends('admin.layouts.admin')

@section('title', __('Add Recommend Blog'))

@section('nav', __('Add Recommend Blog'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/site/index') }}">{{ __('Recommend Blog List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/site/create') }}">{{ __('Add Recommend Blog') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/site/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Name') }}</th>
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
                <th>{{ __('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Approve') }}</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="audit" value="1" checked="checked"> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="audit" value="0">
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
