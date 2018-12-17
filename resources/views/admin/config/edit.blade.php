@extends('layouts.admin')

@section('title', '配置项')

@section('nav', '配置项')

@section('description', '配置项')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>备案号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="117" value="{{  $config['bjyblog.icp'] }}" >
                </td>
            </tr>
            <tr>
                <th>网站名：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="101" value="{{  $config['bjyblog.web_name'] }}" >
                </td>
            </tr>
            <tr>
                <th>网站标题：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="149" value="{{  $config['bjyblog.head.title'] }}" >
                </td>
            </tr>
            <tr>
                <th>网站关键字：</th>
                <td>
                    <textarea class="form-control modal-sm" name="102" rows="5" placeholder="">{{  $config['bjyblog.head.keywords'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>网站描述：</th>
                <td>
                    <textarea class="form-control modal-sm" name="103" rows="5" placeholder="">{{  $config['bjyblog.head.description'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>默认作者：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="125" value="{{  $config['bjyblog.author'] }}" >
                </td>
            </tr>
            <tr>
                <th>文章保留版权提示：</th>
                <td>
                    <textarea class="form-control modal-sm" name="119" rows="5" placeholder="">{{  $config['bjyblog.copyright_word'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>文章图片title和alt内容：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="141" value="{{  $config['bjyblog.alt_word'] }}" >
                </td>
            </tr>
            <tr>
                <th>文字水印内容：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="107" value="{{  $config['bjyblog.water.text'] }}" >
                </td>
            </tr>
            <tr>
                <th>文字水印文字颜色：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="110" value="{{  $config['bjyblog.water.color'] }}" >
                </td>
            </tr>
            <tr>
                <th>百度推送site提交链接：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="128" value="{{  $config['bjyblog.baidu_site_url'] }}" >
                </td>
            </tr>
            <tr>
                <th>第三方统计代码：</th>
                <td>
                    <textarea class="form-control modal-sm" name="123" rows="5" placeholder="">{{  $config['bjyblog.statistics'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>站长邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="118" value="{{  $config['bjyblog.admin_email'] }}" >
                </td>
            </tr>
            <tr>
                <th>用于接收通知的邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="148" value="{{  $config['bjyblog.notification_email'] }}" >
                </td>
            </tr>
            <tr>
                <th>Sentry DSN：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="158" value="{{  $config['sentry.dsn'] }}" >
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>
@endsection
