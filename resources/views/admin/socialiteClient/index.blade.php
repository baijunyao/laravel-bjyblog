@extends('layouts.admin')

@section('title', translate('Socialite Client List'))

@section('nav', translate('Socialite Client List'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>{{ translate('Socialite Client Name') }}</th>
            <th>{{ translate('Client Id') }}</th>
            <th>{{ translate('Client Secret') }}</th>
            <th>{{ translate('Handle') }}</th>
        </tr>
        @foreach($socialite_clients as $socialite_client)
            <tr>
                <td>{{ $socialite_client->id }}</td>
                <td>{{ $socialite_client->name }}</td>
                <td>{{ $socialite_client->client_id }}</td>
                <td>{{ $socialite_client->client_secret }}</td>
                <td><a href="{{ url('admin/socialiteClient/edit', [$socialite_client->id]) }}">{{ translate('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
