@extends('admin.layouts.admin')

@section('title', __('Add Note'))

@section('nav', __('Add Note'))

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/note/index') }}">{{ __('Note List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/note/create') }}">{{ __('Add Note') }}</a>
        </li>
    </ul>

    <form class="form-inline" action="{{ url('admin/note/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Content') }}</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10">{{ old('content') }}</textarea>
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
