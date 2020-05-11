@extends('admin.layouts.admin')

@section('title', __('Edit Comment'))

@section('nav', __('Edit Comment'))

@section('content')
    <form class="form-horizontal " action="{{ url('admin/comment/update', [$comment->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Content') }}</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10">{{ $comment->content }}</textarea>
                </td>
            </tr>
            <tr>
                <th>{{ __('Audited') }}</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="is_audited" value="1" @if($comment->is_audited === 1) checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="is_audited" value="0" @if($comment->is_audited === 0) checked @endif>
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
