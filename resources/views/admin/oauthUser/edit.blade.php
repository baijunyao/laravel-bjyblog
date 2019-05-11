@extends('layouts.admin')

@section('title', __('Edit OAuth User'))

@section('nav', __('Edit OAuth User'))

@section('content')
    <form class="form-inline" action="{{ url('admin/oauthUser/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Type') }}</th>
                <td>
                    {{ $data->oauthClient->name }}
                </td>
            </tr>
            <tr>
                <th>{{ __('Email') }}</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('User Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>

            <tr>
                <th>{{ __('Is Administrator?') }}</th>
                <td>
                    <input type="checkbox" class="js-switch" name="is_admin" value="1" @if($data->is_admin == 1) checked @endif />
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
