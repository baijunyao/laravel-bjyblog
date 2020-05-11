@extends('admin.layouts.admin')

@section('title', __('Edit Article'))

@section('css')
    <link rel="stylesheet" href="{{ asset('statics/editormd/css/editormd.min.css') }}">
    <style>
        #bjy-content{
            z-index: 9999;
        }
    </style>
@endsection

@section('nav', __('Edit Article'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/article/index') }}">{{ __('Article List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/article/create') }}">{{ __('Edit Article') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/article/update', [$article->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th width="7%">{{ __('Category') }}</th>
                <td>
                    <select class="form-control" name="category_id">
                        @foreach($category as $v)
                            <option value="{{ $v->id }}" @if($article->category_id === $v->id) selected="selected" @endif>{{ $v->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>{{ __('Title') }}</th>
                <td>
                    <input class="form-control" type="text" name="title" value="{{ $article->title }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Slug') }}</th>
                <td>
                    <input class="form-control" type="text" name="slug" value="{{ $article->slug }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Author') }}</th>
                <td>
                    <input class="form-control" type="text" name="author" value="{{ $article->author }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Keywords') }}</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ $article->keywords }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Tag') }}</th>
                <td>
                    @foreach($tag as $v)
                        {{ $v['name'] }}<input class="bjy-icheck" type="checkbox" name="tag_ids[]" value="{{ $v['id'] }}" @if(in_array($v['id'], $article->tag_ids)) checked="checked" @endif> &emsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>{{ __('Cover') }}</th>
                <td>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 180px; height: 180px;">
                            <img src="{{ cdn_url($article->cover) }}" alt="{{ __('Cover') }}">
                            <input type="hidden" name="cover" value="{{ $article->cover }}">
                        </div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">{{ __('Select Image') }}</span>
                                <span class="fileinput-exists">{{ __('Change') }}</span>
                                <input type="file" name="cover">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ __('Delete') }}</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>{{ __('Description') }}</th>
                <td>
                    <textarea class="form-control modal-sm" name="description" rows="7" placeholder="{{ __('If it is empty, intercept the first 300 words of the article content.') }}">{{ $article->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Content') }}</th>
                <td>
                    <div id="bjy-content">
                        <textarea name="markdown">{{ $article->markdown }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <th>{{ __('Topping') }}</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="is_top" value="1" @if($article->is_top === 1) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="is_top" value="0" @if($article->is_top === 0) checked @endif>
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
    <script src="{{ asset('statics/editormd/editormd.min.js') }}"></script>
    @if(config('app.locale') !== 'zh-CN')
        <script src="{{ asset('statics/editormd/languages/en.js') }}"></script>
    @endif
    <script>
        var testEditor;

        $(function() {
            // You can custom @link base url.
            editormd.urls.atLinkBase = "https://github.com/";

            testEditor = editormd("bjy-content", {
                autoFocus : false,
                width     : "100%",
                height    : 720,
                toc       : true,
                //atLink    : false,    // disable @link
                //emailLink : false,    // disable email address auto link
                todoList  : true,
                placeholder: "{{ __('Enter article content') }}",
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


