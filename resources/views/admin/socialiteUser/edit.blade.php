@extends('admin.layouts.admin')

@section('title', __('Edit Socialite User'))

@section('nav', __('Edit Socialite User'))

@section('content')
    <form class="form-inline" action="{{ url('admin/socialiteUser/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Type') }}</th>
                <td>
                    {{ $data->socialiteClient->name }}
                </td>
            </tr>
            <tr>
                <th>{{ __('Email') }}</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('User Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>

            <tr>
                <th>{{ __('Is Administrator?') }}</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="is_admin" value="1" @if($data->is_admin === 1) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="is_admin" value="0" @if($data->is_admin === 0) checked @endif>
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
