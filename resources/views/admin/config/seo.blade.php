@extends('layouts.admin')

@section('title', 'SEO')

@section('nav', 'SEO')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Use Slug：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="167" value="true" @if($config['bjyblog.seo.use_slug'] === true) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="167" value="false" @if($config['bjyblog.seo.use_slug'] === false) checked @endif>
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

