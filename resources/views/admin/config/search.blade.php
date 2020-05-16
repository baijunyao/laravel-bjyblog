@extends('admin.layouts.admin')

@section('title', __('Search'))

@section('nav', __('Search'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Driver') }}：</th>
                <td>
                    {{ __('Algolia') }} <input class="bjy-icheck" type="radio" name="177" value="algolia" @if($config['scout.driver'] === 'algolia') checked @endif> &emsp;&emsp;
                    {{ __('Elasticsearch') }} <input class="bjy-icheck" type="radio" name="177" value="elasticsearch" @if($config['scout.driver'] === 'elasticsearch') checked @endif> &emsp;&emsp;
                    {{ __('SQL') }} <input class="bjy-icheck" type="radio" name="177" value="null" @if(Str::isNull($config['scout.driver'])) checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch prefix') }}</th>
                <td>
                    <input class="form-control" type="text" name="178" value="{{  $config['scout.elasticsearch.prefix'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch host') }}</th>
                <td>
                    <input class="form-control" type="text" name="179" value="{{  $config['scout.elasticsearch.host'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch port') }}</th>
                <td>
                    <input class="form-control" type="text" name="180" value="{{  $config['scout.elasticsearch.port'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch scheme') }}</th>
                <td>
                    <input class="form-control" type="text" name="181" value="{{  $config['scout.elasticsearch.scheme'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch user') }}</th>
                <td>
                    <input class="form-control" type="text" name="182" value="{{  $config['scout.elasticsearch.user'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch pass') }}</th>
                <td>
                    <input class="form-control" type="text" name="183" value="{{  $config['scout.elasticsearch.pass'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Elasticsearch analyzer') }}</th>
                <td>
                    <input class="form-control" type="text" name="184" value="{{  $config['scout.elasticsearch.analyzer'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Algolia id') }}</th>
                <td>
                    <input class="form-control" type="text" name="186" value="{{  $config['scout.algolia.id'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ __('Algolia secret') }}</th>
                <td>
                    <input class="form-control" type="text" name="187" value="{{  $config['scout.algolia.secret'] }}">
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

