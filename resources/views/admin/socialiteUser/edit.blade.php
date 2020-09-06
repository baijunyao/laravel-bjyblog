@extends('layouts.admin')

@section('title', translate('Edit Socialite User'))

@section('nav', translate('Edit Socialite User'))

@section('content')
    <form class="form-inline" action="{{ url('admin/socialiteUser/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Type') }}</th>
                <td>
                    {{ $data->socialiteClient->name }}
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email') }}</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('User Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>

            <tr>
                <th>{{ translate('Is Administrator?') }}</th>
                <td>
                    {{ translate('Yes') }} <input class="bjy-icheck" type="radio" name="is_admin" value="1" @if($data->is_admin === 1) checked @endif> &emsp;&emsp;
                    {{ translate('No') }} <input class="bjy-icheck" type="radio" name="is_admin" value="0" @if($data->is_admin === 0) checked @endif>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection
