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
        @foreach($socialiteClients as $socialiteClient)
            <tr>
                <td>{{ $socialiteClient->id }}</td>
                <td>{{ $socialiteClient->name }}</td>
                <td>{{ $socialiteClient->client_id }}</td>
                <td>{{ $socialiteClient->client_secret }}</td>
                <td><a href="{{ url('admin/socialiteClient/edit', [$socialiteClient->id]) }}">{{ translate('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
