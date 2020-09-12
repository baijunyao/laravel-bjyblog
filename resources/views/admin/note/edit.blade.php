@extends('layouts.admin')

@section('title', translate('Edit Note'))

@section('nav', translate('Edit Note'))

@section('content')
    <form class="form-inline" action="{{ url('admin/note/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Content') }}</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10">{{ $data['content'] }}</textarea>
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
