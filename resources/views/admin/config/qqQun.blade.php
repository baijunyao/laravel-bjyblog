@extends('admin.layouts.admin')

@section('title', 'QQ群配置')

@section('nav', 'QQ群配置')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
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
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ __('Delete') }}</a>
                        </div>
                    </div>
                    <a href="http://qun.qq.com/join.html" target="_blank">http://qun.qq.com/join.html</a>
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
