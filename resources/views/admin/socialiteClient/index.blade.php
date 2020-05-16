@extends('admin.layouts.admin')

@section('title', __('Socialite Client List'))

@section('nav', __('Socialite Client List'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>{{ __('Socialite Client Name') }}</th>
            <th>{{ __('Client Id') }}</th>
            <th>{{ __('Client Secret') }}</th>
            <th>{{ __('Handle') }}</th>
        </tr>
        @foreach($socialiteClients as $socialiteClient)
            <tr>
                <td>{{ $socialiteClient->id }}</td>
                <td>{{ $socialiteClient->name }}</td>
                <td>{{ $socialiteClient->client_id }}</td>
                <td>{{ $socialiteClient->client_secret }}</td>
                <td><a href="{{ url('admin/socialiteClient/edit', [$socialiteClient->id]) }}">{{ __('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
