@extends('admin.layouts.admin')

@section('title', __('Social Share'))

@section('nav', __('Social Share'))

@section('content')
    <form class="form-inline" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Select Plugin') }}：</th>
                <td>
                    {{ __('jssocials') }} <input class="bjy-icheck" type="radio" name="168" value="jssocials" @if($config['bjyblog.social_share.select_plugin'] === 'jssocials') checked @endif> &emsp;&emsp;
                    {{ __('sharejs') }} <input class="bjy-icheck" type="radio" name="168" value="sharejs" @if($config['bjyblog.social_share.select_plugin'] === 'sharejs') checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ __('jsSocials Config') }}</th>
                <td>
                    <textarea class="form-control" name="169" cols="70" rows="15" placeholder="">{{  $config['bjyblog.social_share.jssocials_config'] }}</textarea>
                    <a href="http://js-socials.com/docs/#configuration" target="_blank">http://js-socials.com/docs/#configuration</a>
                </td>
            </tr>
            <tr>
                <th>{{ __('ShareJs Config') }}</th>
                <td>
                    <textarea class="form-control" name="170" cols="70" rows="15" placeholder="">{{  $config['bjyblog.social_share.sharejs_config'] }}</textarea>
                    <a href="https://github.com/overtrue/share.js" target="_blank">https://github.com/overtrue/share.js</a>
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

