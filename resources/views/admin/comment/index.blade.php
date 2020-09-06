@extends('layouts.admin')

@section('title', translate('Comment List'))

@section('nav', translate('Comment List'))

@section('css')
    <style>
        /*表格和div内容自动换行*/
        table,
        div {
            word-break: break-all;
            word-wrap: break-word;
        }
    </style>
@endsection

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%">id</th>
            <th width="30%">{{ translate('Content') }}</th>
            <th width="20%">{{ translate('Article') }}</th>
            <th width="8%">{{ translate('User') }}</th>
            <th width="8%">{{ translate('Date') }}</th>
            <th width="6%">{{ translate('Status') }}</th>
            <th width="6%">{{ translate('Audited') }}</th>
            <th width="21%">{{ translate('Handle') }}</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{!! htmlspecialchars_decode($v->content) !!}</td>
                <td>
                    <a href="{{ url('article', [$v->article_id]) }}#comment-{{ $v->id }}" target="_blank">{{ $v->article->title }}</a>
                </td>
                <td>{{ $v->socialiteUser->name }}</td>
                <td>{{ $v->created_at->format('Y-m-d') }}</td>
                <td>
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>
                    @if($v->is_audited === 1)
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>
                    <a href="{{ url('admin/comment/edit', [$v->id]) }}">{{ translate('Edit') }}</a> |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ translate('Delete') }}?'))location.href='{{ url('admin/comment/destroy', [$v->id]) }}'">{{ translate('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ translate('Restore') }}?'))location.href='{{ url('admin/comment/restore', [$v->id]) }}'">{{ translate('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ translate('Force Delete') }}?'))location.href='{{ url('admin/comment/forceDelete', [$v->id]) }}'">{{ translate('Force Delete') }}</a>
                    @endif

                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
