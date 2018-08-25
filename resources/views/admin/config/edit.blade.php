@extends('layouts.admin')

@section('title', '配置项')

@section('css')
    <link href="{{ asset('statics/gentelella/vendors/iCheck/skins/square/blue.css') }}" rel="stylesheet">
    <link href="{{ asset('statics/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection

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
                <th>站长邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="118" value="{{  $config['bjyblog.admin_email'] }}" >
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
                <th>QQ登录APP ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="120" value="{{  $config['services.qq.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ登录APP KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="126" value="{{  $config['services.qq.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录API KEY：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="133" value="{{  $config['services.weibo.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>新浪微博登录SECRET：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="134" value="{{  $config['services.weibo.client_secret'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client ID：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="139" value="{{  $config['services.github.client_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>github Client Secret：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="140" value="{{  $config['services.github.client_secret'] }}" >
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
                <th>邮箱服务器类型：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="154" value="{{  $config['email.driver'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱服务器端口：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="155" value="{{  $config['email.port'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱服务器地址：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="142" value="{{  $config['email.host'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱账号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="143" value="{{  $config['email.username'] }}" >
                </td>
            </tr>
            <tr>
                <th>邮箱密码：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="144" value="{{  $config['email.password'] }}" >
                </td>
            </tr>
            <tr>
                <th>发件人名称：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="145" value="{{  $config['email.from.name'] }}" >
                </td>
            </tr>
            <tr>
                <th>用于接收通知的邮箱：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="148" value="{{  $config['bjyblog.notification_email'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ群说明文章id：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="150" value="{{  $config['bjyblog.qq_qun.article_id'] }}" >
                </td>
            </tr>
            <tr>
                <th>QQ群账号：</th>
                <td>
                    <input class="form-control modal-sm" type="text" name="151" value="{{  $config['bjyblog.qq_qun.number'] }}" >如果群账号为空则前台不展示赞赏捐赠模块
                </td>
            </tr>
            <tr>
                <th>QQ群代码：</th>
                <td>
                    <textarea class="form-control modal-sm" name="152" rows="5" placeholder="">{{  $config['bjyblog.qq_qun.code'] }}</textarea><a href="http://qun.qq.com/join.html" target="_blank">http://qun.qq.com/join.html</a>
                </td>
            </tr>
            <tr>
                <th>QQ群二维码：</th>
                <td>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 180px; height: 180px;">
                            <img src="{{ asset($config['bjyblog.qq_qun.or_code']) }}" alt="群二维码">
                        </div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">选择图片</span>
                                <span class="fileinput-exists">更改</span>
                                <input type="file" name="153">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">删除</a>
                        </div>
                    </div>
                    <a href="http://qun.qq.com/join.html" target="_blank">http://qun.qq.com/join.html</a>
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
    <script src="{{ asset('statics/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
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