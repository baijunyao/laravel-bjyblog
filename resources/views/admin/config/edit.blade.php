@extends('admin.layouts.admin')

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
                        <option value="fr" @if($config['app.locale'] === 'fr') selected @endif>{{ __('French') }}</option>
                        <option value="ru" @if($config['app.locale'] === 'ru') selected @endif>{{ __('Russian') }}</option>
                        <option value="zh-CN" @if($config['app.locale'] === 'zh-CN') selected @endif>{{ __('Chinese(Simplified)') }}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>{{ __('Timezone') }}</th>
                <td>
                    <input class="form-control" type="text" name="195" value="{{  $config['app.timezone'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Logo Style') }}：</th>
                <td>
                    {{ __('Text with php tag') }} <input class="bjy-icheck" type="radio" name="171" value="true" @if(Str::isTrue($config['bjyblog.logo_with_php_tag'])) checked @endif> &emsp;&emsp;
                    {{ __('Only text') }} <input class="bjy-icheck" type="radio" name="171" value="false" @if(Str::isFalse($config['bjyblog.logo_with_php_tag'])) checked @endif>
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
                <th>{{ __('CDN Domain') }}：</th>
                <td>
                    <input class="form-control" type="text" name="172" value="{{  $config['bjyblog.cdn_domain'] }}" >
                </td>
            </tr>
            <tr>
                <th>Cookie Domain：</th>
                <td>
                    <input class="form-control" type="text" name="185" value="{{  $config['session.domain'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Link Target') }}：</th>
                <td>
                    {{ __('New Tab') }} <input class="bjy-icheck" type="radio" name="193" value="_blank" @if($config['bjyblog.link_target'] === '_blank') checked @endif> &emsp;&emsp;
                    {{ __('Current Tab') }} <input class="bjy-icheck" type="radio" name="193" value="_self" @if($config['bjyblog.link_target'] === '_self') checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ __('Breadcrumb') }}：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="194" value="true" @if(Str::isTrue($config['bjyblog.breadcrumb'])) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="194" value="false" @if(Str::isFalse($config['bjyblog.breadcrumb'])) checked @endif>
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
