<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ config('bjyblog.head.title') }} @endif</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/github/github-6c564594311e54614a4a1f0d0f37b543.css') }}">
    <link rel="stylesheet" href="{{ url('css/github/frameworks-146fab5ea30e8afac08dd11013bb4ee0.css') }}">
    @yield('css')
</head>
<body class="logged-out env-production page-responsive page-profile intent-mouse">

@yield('content')

@yield('js')
</body>
</html>
