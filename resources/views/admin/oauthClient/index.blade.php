@extends('layouts.admin')

@section('title', __('OAuth Client List'))

@section('nav', __('OAuth Client List'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>{{ __('OAuth Client Name') }}</th>
            <th>{{ __('Client Id') }}</th>
            <th>{{ __('Client Secret') }}</th>
            <th>{{ __('Handle') }}</th>
        </tr>
        @foreach($oauthClients as $oauthClient)
            <tr>
                <td>{{ $oauthClient->id }}</td>
                <td>{{ $oauthClient->name }}</td>
                <td>{{ $oauthClient->client_id }}</td>
                <td>{{ $oauthClient->client_secret }}</td>
                <td><a href="{{ url('admin/oauthClient/edit', [$oauthClient->id]) }}">{{ __('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
