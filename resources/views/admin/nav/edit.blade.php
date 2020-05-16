@extends('admin.layouts.admin')

@section('title', __('Edit Nav'))

@section('nav', __('Edit Nav'))

@section('content')
    <form class="form-horizontal " action="{{ url('admin/nav/update', [$nav->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Nav Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $nav->name }}">
                </td>
            </tr>
            <tr>
                <th>URL</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $nav->url }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $nav->sort }}">
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
