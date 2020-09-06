@extends('layouts.admin')

@section('title', translate('Recommend Blog List'))

@section('nav', translate('Recommend Blog List'))

@section('content')

    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('admin/site/index') }}">{{ translate('Recommend Blog List') }}</a>
        </li>
        <li>
            <a href="{{ url('admin/site/create') }}">{{ translate('Add Recommend Blog') }}</a>
        </li>
    </ul>
    <form action="{{ url('admin/site/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th width="5%">id</th>
                <th width="5%">{{ translate('Sort') }}</th>
                <th width="10%">{{ translate('Name') }}</th>
                <th width="10%">URL</th>
                <th width="40%">{{ translate('Description') }}</th>
                <th width="5%">{{ translate('Status') }}</th>
                <th width="15%">{{ translate('Handle') }}</th>
            </tr>
            @foreach($site as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>
                        <input class="form-control" type="text" name="{{ $v->id }}" value="{{ $v->sort }}">
                    </td>
                    <td>{{ $v->name }}</td>
                    <td><a href="{{ $v->url }}" target="_blank">{{ $v->url }}</a></td>
                    <td>{{ $v->description }}</td>
                    <td>
                        @if($v->audit == 1)
                            √
                        @else
                            ×
                        @endif
                    </td>
                    <td>
                        @if($v->audit == 1)
                            <a class="js-audit" href="javascript:;" data-id="{{ $v->id }}" data-audit="0">{{ translate('Remove Approval') }}</a>
                        @else
                            <a class="js-audit" href="javascript:;" data-id="{{ $v->id }}" data-audit="1">{{ translate('Approve') }}</a>
                        @endif
                        |
                        <a href="{{ url('admin/site/edit', [$v->id]) }}">{{ translate('Edit') }}</a> |
                        @if(is_null($v->deleted_at))
                            <a href="javascript:if(confirm('{{ translate('Delete') }}?')) location='{{ url('admin/site/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                        @else
                            <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/site/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                            |
                            <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/site/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Sort') }}">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
@endsection

@section('js')
    <script>
        $('.js-audit').click(function () {
            if (!confirm('{{ translate('Confirm') }}?')) {
                return false;
            }
            var id = $(this).attr('data-id');
            var url = '{{ url('admin/site/update') }}' + '/' + id;
            var postData = {
                audit: $(this).attr('data-audit')
            }
            $.post(url, postData, function () {
                location.reload();
            })
        })
    </script>
@endsection
