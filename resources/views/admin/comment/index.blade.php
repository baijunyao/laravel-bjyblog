@extends('layouts.admin')

@section('title', __('Comment List'))

@section('nav', __('Comment List'))

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
            <th width="30%">{{ __('Content') }}</th>
            <th width="20%">{{ __('Article') }}</th>
            <th width="8%">{{ __('User') }}</th>
            <th width="8%">{{ __('Date') }}</th>
            <th width="6%">{{ __('Status') }}</th>
            <th width="6%">{{ __('Audited') }}</th>
            <th width="21%">{{ __('Handle') }}</th>
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
                    <a href="{{ url('admin/comment/edit', [$v->id]) }}">{{ __('Edit') }}</a> |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('{{ __('Delete') }}?'))location.href='{{ url('admin/comment/destroy', [$v->id]) }}'">{{ __('Delete') }}</a>
                    @else
                        <a href="javascript:if(confirm('{{ __('Restore') }}?'))location.href='{{ url('admin/comment/restore', [$v->id]) }}'">{{ __('Restore') }}</a>
                        |
                        <a href="javascript:if(confirm('{{ __('Force Delete') }}?'))location.href='{{ url('admin/comment/forceDelete', [$v->id]) }}'">{{ __('Force Delete') }}</a>
                    @endif

                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links('vendor.pagination.bjypage') }}
    </div>
@endsection
