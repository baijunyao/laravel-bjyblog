@extends('layouts.admin')

@section('title', '编辑文章')

@section('css')
    <link rel="stylesheet" href="{{ asset('statics/editormd/css/editormd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('statics/iCheck-1.0.2/skins/all.css') }}">
    <link rel="stylesheet" href="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.css') }}">
@endsection

@section('nav', '编辑文章')

@section('description', '编辑或者查看文章详情')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/article/index') }}">文章列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/article/create') }}">编辑文章</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/article/update', [$article->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th width="7%">分类</th>
                <td>
                    <select class="form-control" name="category_id">
                        @foreach($category as $v)
                            <option value="{{ $v->id }}" @if($article->category_id === $v->id) selected="selected" @endif>{{ $v->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>标题</th>
                <td>
                    <input class="form-control" type="text" name="title" value="{{ $article->title }}">
                </td>
            </tr>
            <tr>
                <th>作者</th>
                <td>
                    <input class="form-control" type="text" name="author" value="{{ $article->author }}">
                </td>
            </tr>
            <tr>
                <th>关键词</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ $article->keywords }}">
                </td>
            </tr>
            <tr>
                <th>标签</th>
                <td>
                    @foreach($tag as $v)
                        {{ $v['name'] }}<input class="bjy-icheck" type="checkbox" name="tag_ids[]" value="{{ $v['id'] }}" @if(in_array($v['id'], $article->tag_ids)) checked="checked" @endif> &emsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <textarea class="form-control modal-sm" name="description" rows="7" placeholder="可以不填，如不填；则截取文章内容前300字为描述">{{ $article->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>内容</th>
                <td>
                    <div id="bjy-content">
                        <textarea name="markdown">{{ $article->markdown }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <th>置顶</th>
                <td>
                    <input class="js-switch" type="checkbox" name="is_top" value="1" @if($article->is_top == 1) checked="checked" @endif>
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
    <script src="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('statics/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('statics/iCheck-1.0.2/icheck.min.js') }}"></script>
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
                placeholder: '输入文章内容',
                toolbarAutoFixed: false,
                path      : '{{ asset('/statics/editormd/lib') }}/',
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'bold', 'del', 'italic', 'quote', 'uppercase', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'code', 'code-block', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'search', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{ url('admin/article/uploadImage') }}',
            });
            $('.bjy-icheck').iCheck({
                checkboxClass: "icheckbox_minimal-blue",
                radioClass: "iradio_minimal-blue",
                increaseArea: "20%"
            });

        });
    </script>



@endsection


