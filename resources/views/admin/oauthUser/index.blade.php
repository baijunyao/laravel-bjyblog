@extends('layouts.admin')

@section('title', __('OAuth User'))

@section('nav', __('OAuth User'))

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>{{ __('User Name') }}</th>
            <th>{{ __('Type') }}</th>
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
                    @if($v->type == 1)QQ @endif
                    @if($v->type == 2){{ __('Weibo') }} @endif
                    @if($v->type == 3)github @endif
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
                <td><a href="{{ url('admin/oauthUser/edit', [$v->id]) }}">{{ __('Edit') }}</a></td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
