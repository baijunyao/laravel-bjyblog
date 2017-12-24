<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理后台登录 - laravel-bjyblog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="{{ asset('statics/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('statics/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('statics/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="nav-md">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ url('auth/admin/login') }}" method="post">
                    <input class="hidden" type="checkbox" name="remember" checked>
                    {{ csrf_field() }}
                    <h1>管理后台</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}">
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <div>
                        {{--成功或者错误提示--}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('alert-message'))
                            <div class="alert {{session('alert-class')}}">
                                <ul>
                                    <li>{{ session('alert-message') }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">登录</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <h1><i class="fa fa-paw"></i> {{ $config['WEB_NAME'] }}!</h1>
                            <p>©2017 All Rights Reserved. {{ $config['WEB_NAME'] }}! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('statics/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('statics/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('statics/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('statics/gentelella/vendors/nprogress/nprogress.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('statics/gentelella/build/js/custom.min.js') }}"></script>
@yield('js')
</body>
</html>