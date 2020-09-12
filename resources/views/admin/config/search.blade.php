@extends('layouts.admin')

@section('title', translate('Search'))

@section('nav', translate('Search'))

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Driver') }}：</th>
                <td>
                    {{ translate('Algolia') }} <input class="bjy-icheck" type="radio" name="177" value="algolia" @if($config['scout.driver'] === 'algolia') checked @endif> &emsp;&emsp;
                    {{ translate('Elasticsearch') }} <input class="bjy-icheck" type="radio" name="177" value="elasticsearch" @if($config['scout.driver'] === 'elasticsearch') checked @endif> &emsp;&emsp;
                    {{ translate('SQL') }} <input class="bjy-icheck" type="radio" name="177" value="null" @if(Str::isNull($config['scout.driver'])) checked @endif>
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch prefix') }}</th>
                <td>
                    <input class="form-control" type="text" name="178" value="{{  $config['scout.elasticsearch.prefix'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch host') }}</th>
                <td>
                    <input class="form-control" type="text" name="179" value="{{  $config['scout.elasticsearch.host'] }}" >
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch port') }}</th>
                <td>
                    <input class="form-control" type="text" name="180" value="{{  $config['scout.elasticsearch.port'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch scheme') }}</th>
                <td>
                    <input class="form-control" type="text" name="181" value="{{  $config['scout.elasticsearch.scheme'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch user') }}</th>
                <td>
                    <input class="form-control" type="text" name="182" value="{{  $config['scout.elasticsearch.user'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch pass') }}</th>
                <td>
                    <input class="form-control" type="text" name="183" value="{{  $config['scout.elasticsearch.pass'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Elasticsearch analyzer') }}</th>
                <td>
                    <input class="form-control" type="text" name="184" value="{{  $config['scout.elasticsearch.analyzer'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Algolia id') }}</th>
                <td>
                    <input class="form-control" type="text" name="186" value="{{  $config['scout.algolia.id'] }}">
                </td>
            </tr>
            <tr>
                <th>{{ translate('Algolia secret') }}</th>
                <td>
                    <input class="form-control" type="text" name="187" value="{{  $config['scout.algolia.secret'] }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection

