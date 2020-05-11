@extends('admin.layouts.admin')

@section('title', __('Edit Open Source'))

@section('nav', __('Edit Open Source'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/openSource/index') }}">{{ __('Open Source List') }}</a>
        </li>
        <li class="active">
            <a href="">{{ __('Edit Open Source') }}</a>
        </li>
    </ul>
    <form class="form-inline " action="{{ url('admin/openSource/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Type') }}</th>
                <td>
                    <span class="inputword">github</span>
                    <input class="bjy-icheck" type="radio" name="type" value="1" @if($data->type == 1) checked @endif>
                    <span class="inputword">gitee</span>
                    <input class="bjy-icheck" type="radio" name="type" value="2" @if($data->type == 2) checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ __('Name') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Sort') }}</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="sort" value="{{ $data->sort }}">
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
