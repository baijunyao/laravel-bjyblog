@extends('layouts.admin')

@section('title', '配置项')

@section('nav', '配置项')

@section('description', '配置项')

@section('content')
    <form action="">
        <table class="table table-striped table-bordered table-hover">
            @foreach($data as $k => $v)
                <tr>
                    <th width="15%">{{ $v->title }}</th>
                    <td>
                        <input class="form-control" type="text" name="{{ $v->name }}" value="{{ $v->value }}">
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
@endsection
