@extends('layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')
    <div class="col-xs-12 col-md-12 col-lg-8">
        <div class="row b-article">
            @foreach($site as $k => $v)
                <ul class="col-xs-12 col-md-4 col-lg-4">
                    <li>{{ $v->name }}</li>
                    <li></li>
                    <li></li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('statics/layer-2.4/layer.js') }}"></script>
@endsection