@extends('layouts.admin')

@section('title', __('Socialite User'))

@section('nav', __('Socialite User'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>{{ __('User Name') }}</th>
            <th>{{ __('Socialite Client Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Login times') }}</th>
            <th>{{ __('Is Administrator?') }}?</th>
            <th>ip</th>
            <th>{{ __('Last login') }}</th>
            <th>{{ __('First login') }}</th>
            <th>{{ __('Handle') }}</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>
                    {{ $v->socialiteClient->name }}
                </td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->login_times }}</td>
                <td>
                    @if($v->is_admin == 1)
                        √️
                    @else
                        ×
                    @endif
                </td>
                <td>
                    {{ $v->last_login_ip }}
                </td>
                <td>{{ $v->updated_at }}</td>
                <td>{{ $v->created_at }}</td>
                <td><a href="{{ url('admin/socialiteUser/edit', [$v->id]) }}">{{ __('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
