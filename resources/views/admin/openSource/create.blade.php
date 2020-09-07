@extends('layouts.admin')

@section('title', translate('Add Open Source'))

@section('nav', translate('Add Open Source'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/openSource/index') }}">{{ translate('Open Source List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/openSource/create') }}">{{ translate('Add Open Source') }}</a>
        </li>
    </ul>
    <form class="form-inline " action="{{ url('admin/openSource/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Type') }}</th>
                <td>
                    <span class="inputword">github</span>
                    <input class="bjy-icheck" type="radio" name="type" value="1" @if(empty(old('type')) || old('type') == 1) checked @endif>
                    <span class="inputword">gitee</span>
                    <input class="bjy-icheck" type="radio" name="type" value="2" @if(old('type') == 2) checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ translate('Name') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Sort') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="sort" value="{{ old('sort') }}">
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

@section('js')
    <script>
        $(document).ready(function(){
            $('.bjy-icheck').iCheck({
                checkboxClass: 'icheckbox_square-red',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection
