@extends('layouts.admin')

@section('title', translate('Edit Recommend Blog'))

@section('nav', translate('Edit Recommend Blog'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/site/index') }}">{{ translate('Recommend Blog List') }}</a>
        </li>
        <li class="active">
            <a href="">{{ translate('Edit Recommend Blog') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/site/update', [$site->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $site->name }}">
                </td>
            </tr>
            <tr>
                <th>URL</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $site->url }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Description') }}</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $site->description }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $site->sort }}">
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
