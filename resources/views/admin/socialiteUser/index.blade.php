@extends('layouts.admin')

@section('title', translate('Socialite User'))

@section('nav', translate('Socialite User'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>{{ translate('User Name') }}</th>
            <th>{{ translate('Socialite Client Name') }}</th>
            <th>{{ translate('Email') }}</th>
            <th>{{ translate('Login times') }}</th>
            <th>{{ translate('Is Administrator?') }}?</th>
            <th>ip</th>
            <th>{{ translate('Last login') }}</th>
            <th>{{ translate('First login') }}</th>
            <th>{{ translate('Handle') }}</th>
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
                <td><a href="{{ url('admin/socialiteUser/edit', [$v->id]) }}">{{ translate('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
