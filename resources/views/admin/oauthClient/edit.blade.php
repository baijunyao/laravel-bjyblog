@extends('layouts.admin')

@section('title', __('Edit OAuth Client'))

@section('nav', __('Edit OAuth Client'))

@section('content')
    <form class="form-inline" action="{{ url('admin/oauthClient/update', [$oauthClient->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('OAuth Client Name') }}</th>
                <td>
                    {{ $oauthClient->name }}
                </td>
            </tr>
            <tr>
                <th>{{ __('OAuth Client Id') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_id" value="{{ $oauthClient->client_id }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('OAuth Client Secret') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_secret" value="{{ $oauthClient->client_secret }}">
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
