@extends('admin.layouts.admin')

@section('title', __('Edit Socialite Client'))

@section('nav', __('Edit Socialite Client'))

@section('content')
    <form class="form-inline" action="{{ url('admin/socialiteClient/update', [$socialiteClient->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Socialite Client Name') }}</th>
                <td>
                    {{ $socialiteClient->name }}
                </td>
            </tr>
            <tr>
                <th>{{ __('Socialite Client Id') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_id" value="{{ $socialiteClient->client_id }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Socialite Client Secret') }}</th>
                <td>
                    <input class="form-control" type="text" name="client_secret" value="{{ $socialiteClient->client_secret }}">
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
