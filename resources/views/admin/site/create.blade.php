@extends('layouts.admin')

@section('title', translate('Add Recommend Blog'))

@section('nav', translate('Add Recommend Blog'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/site/index') }}">{{ translate('Recommend Blog List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/site/create') }}">{{ translate('Add Recommend Blog') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/site/store') }}" method="post">
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
                <th>{{ translate('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Approve') }}</th>
                <td>
                    {{ translate('Yes') }} <input class="bjy-icheck" type="radio" name="audit" value="1" checked="checked"> &emsp;&emsp;
                    {{ translate('No') }} <input class="bjy-icheck" type="radio" name="audit" value="0">
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
