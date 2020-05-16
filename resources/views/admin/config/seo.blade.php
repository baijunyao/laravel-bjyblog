@extends('admin.layouts.admin')

@section('title', 'SEO')

@section('nav', 'SEO')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Use Slug') }}：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="167" value="true" @if(Str::isTrue($config['bjyblog.seo.use_slug'])) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="167" value="false" @if(Str::isFalse($config['bjyblog.seo.use_slug'])) checked @endif>
                </td>
            </tr>
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
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ __('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection

