@extends('admin.layouts.admin')

@section('title', __('Add Article'))

@section('css')
    <link rel="stylesheet" href="{{ asset('statics/editormd/css/editormd.min.css') }}">
    <style>
        #bjy-content{
            z-index: 1000;
        }
    </style>
@endsection

@section('nav', __('Add Article'))

@section('content')


    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/article/index') }}">{{ __('Article List') }}</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/article/create') }}">{{ __('Add Article') }}</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('admin/article/store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th width="7%">{{ __('Category') }}</th>
                <td>
                    <select class="form-control" name="category_id">
                        <option value="">{{ __('Select Category') }}</option>
                        @foreach($category as $v)
                            <option value="{{ $v->id }}" @if(old('category_id')) selected="selected" @endif>{{ $v->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>{{ __('Title') }}</th>
                <td>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Author') }}</th>
                <td>
                    <input class="form-control" type="text" name="author" value="@if(empty(old('author'))){{ $author }}@else{{ old('author') }}@endif">
                </td>
            </tr>
            <tr>
                <th>{{ __('Keywords') }}</th>
                <td>
                    <input class="form-control" type="text" placeholder="{{ __('Separated by commas') }}" name="keywords" value="{{ old('keywords') }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Tag') }}</th>
                <td>
                    @foreach($tag as $v)
                        {{ $v['name'] }}<input class="bjy-icheck" type="checkbox" name="tag_ids[]" value="{{ $v['id'] }}" @if(in_array($v['id'], old('tag_ids', []))) checked="checked" @endif> &emsp;
                    @endforeach
                    <i class="fa fa-plus-square" style="font-size: 20px;cursor: pointer" data-toggle="modal" data-target="#bjy-tag-modal"></i>
                </td>
            </tr>
            <tr>
                <th>{{ __('Cover') }}</th>
                <td>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 220px; height: 150px;">

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
                    <textarea class="form-control modal-sm" name="description" rows="7" placeholder="{{ __('If it is empty, intercept the first 300 words of the article content.') }}">{{ old('description') }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Content') }}</th>
                <td>
                    <div id="bjy-content">
                        <textarea name="markdown">{{ old('markdown') }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <th>{{ __('Topping') }}</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="is_top" value="1"> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="is_top" value="0" checked="checked">
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

    {{--添加标签--}}
    <div class="modal fade" id="bjy-tag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('Add Tag') }}</h4>
                </div>
                <div class="modal-body text-center">
                    <form class="form-inline" role="form">
                        <input class="form-control bjy-tag-name" type="text" placeholder="{{ __('Name') }}">
                        <button type="button" class="btn btn-success js-add-tag">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        });

        // 添加标签
        $('.js-add-tag').click(function () {
            var postData = {
                name: $('.bjy-tag-name').val()
            }
            $.ajax({
                type: 'POST',
                url: '{{ url('admin/tag/store') }}',
                dataType: 'json',
                data: postData,
                success: function (response) {
                    var redioStr = response.name+'<input class="bjy-icheck" type="checkbox" name="tag_ids[]" value="'+response.id+'" checked="checked"> &emsp;';
                    $('.fa-plus-square').before(redioStr);
                    $('.bjy-icheck').iCheck({
                        checkboxClass: "icheckbox_minimal-blue",
                        radioClass: "iradio_minimal-blue",
                        increaseArea: "20%"
                    });
                    $('#bjy-tag-modal').modal('hide');
                },
                error: function (response) {
                    $.each(response.responseJSON.errors, function (k, v) {
                        alert(v);
                    })
                }
            })
        })
    </script>

@endsection


