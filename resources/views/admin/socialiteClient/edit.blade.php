@extends('layouts.admin')

@section('title', translate('Edit Socialite Client'))

@section('nav', translate('Edit Socialite Client'))

@section('content')
    <form class="form-inline" action="{{ url('admin/socialiteClient/update', [$socialite_client->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Socialite Client Name') }}</th>
                <td>
                    {{ $socialite_client->name }}
                </td>
            </tr>
            <tr>
                <th>{{ translate('Socialite Client Id') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_id" value="{{ $socialite_client->client_id }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Socialite Client Secret') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_secret" value="{{ $socialite_client->client_secret }}">
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
