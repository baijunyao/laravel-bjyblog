@extends('layouts.admin')

@section('title', translate('Email Config'))

@section('nav', translate('Email Config'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Email Driver') }}</th>
                <td>
                    {{ $config['mail.default'] }}
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email Encryption') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="156" value="{{  $config['mail.mailers.smtp.encryption'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email Port') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="155" value="{{  $config['mail.mailers.smtp.port'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email Host') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="142" value="{{  $config['mail.mailers.smtp.host'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email Username') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="143" value="{{  $config['mail.mailers.smtp.username'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email Password') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="144" value="{{  $config['mail.mailers.smtp.password'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email From Name') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="145" value="{{  $config['mail.from.name'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Email From Address') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="157" value="{{  $config['mail.from.address'] }}" >
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
