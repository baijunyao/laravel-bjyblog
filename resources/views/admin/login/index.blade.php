@extends('layouts.gentelella')

@section('title', '登录')

@section('body')

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
                            <button class="btn btn-default submit" type="submit">登录</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <div>
                                <h1><i class="fa fa-paw"></i> {{ config('app.name') }}!</h1>
                                <p>©2017 All Rights Reserved. {{ config('app.name') }}! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

@endsection
