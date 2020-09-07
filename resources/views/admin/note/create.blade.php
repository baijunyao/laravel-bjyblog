@extends('layouts.admin')

@section('title', translate('Add Note'))

@section('nav', translate('Add Note'))

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/note/index') }}">{{ translate('Note List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/note/create') }}">{{ translate('Add Note') }}</a>
        </li>
    </ul>

    <form class="form-inline" action="{{ url('admin/note/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Content') }}</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10">{{ old('content') }}</textarea>
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
