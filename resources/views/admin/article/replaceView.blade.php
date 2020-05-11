@extends('admin.layouts.admin')

@section('title', __('Batch Replace'))

@section('nav', __('Batch Replace'))

@section('content')
    <form class="form-inline" action="{{ url('admin/article/replace') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Content') }}</th>
                <td>
                    <input class="form-control" type="text" name="search" value="{{ old('search') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Replace to') }}</th>
                <td>
                    <input class="form-control" type="text" name="replace" value="{{ old('replace') }}">
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
