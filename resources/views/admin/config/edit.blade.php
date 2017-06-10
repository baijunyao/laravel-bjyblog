@extends('layouts.admin')

@section('title', '配置项')

@section('css')
    <link href="{{ asset('statics/gentelella/vendors/iCheck/skins/square/blue.css') }}" rel="stylesheet">
@endsection

@section('nav', '配置项')

@section('description', '配置项')

@section('content')
    <form class="form-inline" action="{{ url('admin/config/update') }}" method="post">
        <table class="table table-striped table-bordered table-hover">
            {{ csrf_field() }}
            <tr>
                <th width="20%">网站状态：</th>
                <td>
                    <span class="inputword">开启</span>
                    <input class="bjy-icheck" type="radio" name="WEB_STATUS" value="1" @if($data['WEB_STATUS'] ==1) checked @endif>
                    <span class="inputword">关闭</span>
                    <input class="bjy-icheck" type="radio" name="WEB_STATUS" value="0" @if($data['WEB_STATUS'] ==0) checked @endif>
                </td>
            </tr>
            <tr>
                <th>网站关闭时提示文字：</th>
                <td>
                    <textarea class="form-control modal-sm" name="WEB_CLOSE_WORD" rows="5" placeholder="">{{ $data['WEB_CLOSE_WORD'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>备案号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="WEB_ICP_NUMBER" value="{{  $data['WEB_ICP_NUMBER'] }}" >
                </td>
            </tr>
            <tr>
                <th>站长邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="ADMIN_EMAIL" value="{{  $data['ADMIN_EMAIL'] }}" >
                </td>
            </tr>
            <tr>
                <th>网站名：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="WEB_NAME" value="{{  $data['WEB_NAME'] }}" >
                </td>
            </tr>
            <tr>
                <th>网站关键字：</th>
                <td>
                    <textarea class="form-control modal-sm" name="WEB_KEYWORDS" rows="5" placeholder="">{{  $data['WEB_KEYWORDS'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>网站描述：</th>
                <td>
                    <textarea class="form-control modal-sm" name="WEB_DESCRIPTION" rows="5" placeholder="">{{  $data['WEB_DESCRIPTION'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>默认作者：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="AUTHOR" value="{{  $data['AUTHOR'] }}" >
                </td>
            </tr>
            <tr>
                <th>文章保留版权提示：</th>
                <td>
                    <textarea class="form-control modal-sm" name="COPYRIGHT_WORD" rows="5" placeholder="">{{  $data['COPYRIGHT_WORD'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>文章图片title和alt内容：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="IMAGE_TITLE_ALT_WORD" value="{{  $data['IMAGE_TITLE_ALT_WORD'] }}" >
                </td>
            </tr>
            <tr>
                <th>文字水印内容：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="TEXT_WATER_WORD" value="{{  $data['TEXT_WATER_WORD'] }}" >
                </td>
            </tr>
            <tr>
                <th>文字水印文字颜色：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="TEXT_WATER_COLOR" value="{{  $data['TEXT_WATER_COLOR'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ登录APP ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="QQ_APP_ID" value="{{  $data['QQ_APP_ID'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ登录APP KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="QQ_APP_KEY" value="{{  $data['QQ_APP_KEY'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录API KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="SINA_API_KEY" value="{{  $data['SINA_API_KEY'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录SECRET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="SINA_SECRET" value="{{  $data['SINA_SECRET'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="GITHUB_CLIENT_ID" value="{{  $data['GITHUB_CLIENT_ID'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client Secret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="GITHUB_CLIENT_SECRET" value="{{  $data['GITHUB_CLIENT_SECRET'] }}" >
                </td>
            </tr>
            <tr>
                <th>百度推送site提交链接：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="BAIDU_SITE_URL" value="{{  $data['BAIDU_SITE_URL'] }}" >
                </td>
            </tr>
            <tr>
                <th>第三方统计代码：</th>
                <td>
                    <textarea class="form-control modal-sm" name="WEB_STATISTICS" rows="5" placeholder="">{{  $data['WEB_STATISTICS'] }}</textarea>
                </td>
            </tr>
            <tr>
                <th>SMTP服务器：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="EMAIL_SMTP" value="{{  $data['EMAIL_SMTP'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱账号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="EMAIL_USERNAME" value="{{  $data['EMAIL_USERNAME'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱密码：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="EMAIL_PASSWORD" value="{{  $data['EMAIL_PASSWORD'] }}" >
                </td>
            </tr>
            <tr>
                <th>发件人名称：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="EMAIL_FROM_NAME" value="{{  $data['EMAIL_FROM_NAME'] }}" >
                </td>
            </tr>
            <tr>
                <th>接收评论通知邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="EMAIL_RECEIVE" value="{{  $data['EMAIL_RECEIVE'] }}" >
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

@section('js')
    <script src="{{ asset('statics/gentelella/vendors/iCheck/icheck.min.js') }}"></script>
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