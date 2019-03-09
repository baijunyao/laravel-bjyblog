@extends('layouts.admin')

@section('title', __('Other Config'))

@section('nav', __('Other Config'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Language') }}</th>
                <td>
                    <select class="form-control" name="166">
                        <option value="en" @if($config['app.locale'] === 'en') selected @endif>{{ __('English') }}</option>
                        <option value="zh-CN" @if($config['app.locale'] === 'zh-CN') selected @endif>{{ __('Chinese(Simplified)') }}</option>
                    </select>
                </td>
            </tr>
            @if($config['app.locale'] === 'zh-CN')
                <tr>
                    <th>{{ __('ICP') }}</th>
                    <td>
                        <input class="form-control" type="text" name="117" value="{{  $config['bjyblog.icp'] }}" >
                    </td>
                </tr>
            @endif
            <tr>
                <th>{{ __('Blog Name') }}</th>
                <td>
                    <input class="form-control" type="text" name="101" value="{{  $config['app.name'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Blog Title') }}</th>
                <td>
                    <input class="form-control" type="text" name="149" value="{{  $config['bjyblog.head.title'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Blog Keywords') }}</th>
                <td>
                    <textarea class="form-control" name="102" rows="5" placeholder="">{{  $config['bjyblog.head.keywords'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Blog Description') }}</th>
                <td>
                    <textarea class="form-control" name="103" rows="5" placeholder="">{{  $config['bjyblog.head.description'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Default Author') }}</th>
                <td>
                    <input class="form-control" type="text" name="125" value="{{  $config['bjyblog.author'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Article Copyright Word') }}</th>
                <td>
                    <textarea class="form-control" name="119" rows="5" placeholder="">{{  $config['bjyblog.copyright_word'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Image Alt Word') }}</th>
                <td>
                    <input class="form-control" type="text" name="141" value="{{  $config['bjyblog.alt_word'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Image Water Text') }}</th>
                <td>
                    <input class="form-control" type="text" name="107" value="{{  $config['bjyblog.water.text'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Image Water Color') }}</th>
                <td>
                    <input class="form-control" type="text" name="110" value="{{  $config['bjyblog.water.color'] }}" >
                </td>
            </tr>
            @if($config['app.locale'] === 'zh-CN')
                <tr>
                    <th>{{ __('Baidu Site URL') }}</th>
                    <td>
                        <input class="form-control" type="text" name="128" value="{{  $config['bjyblog.baidu_site_url'] }}" >
                    </td>
                </tr>
            @endif
            <tr>
                <th>{{ __('Statistics Code') }}</th>
                <td>
                    <textarea class="form-control" name="123" rows="5" placeholder="">{{  $config['bjyblog.statistics'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Admin Email') }}</th>
                <td>
                    <input class="form-control" type="text" name="118" value="{{  $config['bjyblog.admin_email'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Notification Email') }}</th>
                <td>
                    <input class="form-control" type="text" name="148" value="{{  $config['bjyblog.notification_email'] }}" >
                </td>
            </tr>
            <tr>
                <th>Sentry DSN：</th>
                <td>
                    <input class="form-control" type="text" name="158" value="{{  $config['sentry.dsn'] }}" >
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
