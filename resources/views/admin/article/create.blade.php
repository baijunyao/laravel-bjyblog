@extends('layouts.admin')

@section('title', '发布文章')

@section('css')
    <link rel="stylesheet" href="{{ asset('/statics/editormd/css/editormd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/statics/iCheck-1.0.2/skins/all.css') }}">
@endsection

@section('nav', '发布文章')

@section('description', '发布新的文章')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/article/index') }}">文章列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/article/create') }}">发布文章</a>
        </li>
    </ul>
    <form class="form-inline" action="{{ url('admin/role_user/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>所属分类</th>
                <td>
                    <select name="">

                    </select>
                </td>
            </tr>
            <tr>
                <th>标题</th>
                <td>
                    <input class="form-control" type="text" name="phone">
                </td>
            </tr>
            <tr>
                <th>作者</th>
                <td>
                    <input class="form-control" type="text" name="email">
                </td>
            </tr>
            <tr>
                <th>标签</th>
                <td>
                    <input class="form-control" type="text" name="password">
                </td>
            </tr>
            <tr>
                <th>关键词</th>
                <td>
                    <input class="form-control" type="text" name="password">
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <input class="form-control" type="text" name="password">
                </td>
            </tr>
            <tr>
                <th>内容</th>
                <td>
                    <div id="bjy-content">
                        <textarea name="content"></textarea>
                    </div>
                </td>
            </tr>



            <tr>
                <th>是否原创</th>
                <td>
                    <span class="inputword">允许登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="1" checked="checked">
                    &emsp;
                    <span class="inputword">禁止登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="2">
                </td>
            </tr>
            <tr>
                <th>是否置顶</th>
                <td>
                    <span class="inputword">允许登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="1" checked="checked">
                    &emsp;
                    <span class="inputword">禁止登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="2">
                </td>
            </tr>
            <tr>
                <th>是否显示</th>
                <td>
                    <span class="inputword">允许登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="1" checked="checked">
                    &emsp;
                    <span class="inputword">禁止登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="2">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>

@endsection

@section('js')
    <script src="{{ asset('/statics/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('/statics/iCheck-1.0.2/icheck.min.js') }}"></script>
    <script>
        var testEditor;

        $(function() {
            // You can custom @link base url.
            editormd.urls.atLinkBase = "https://github.com/";

            testEditor = editormd("bjy-content", {
                width     : "100%",
                height    : 720,
                toc       : true,
                //atLink    : false,    // disable @link
                //emailLink : false,    // disable email address auto link
                todoList  : true,
                path      : '{{ asset('/statics/editormd/lib') }}/'
            });

            $('.xb-icheck').iCheck({
                checkboxClass: "icheckbox_minimal-blue",
                radioClass: "iradio_minimal-blue",
                increaseArea: "20%"
            });

        });
    </script>



@endsection


