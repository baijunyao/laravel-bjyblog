@extends('layouts.gentelella')

@section('title', translate('Sign In'))

@section('css')
    <style>
        .login_content {
            text-shadow: none;
        }
    </style>
@endsection

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
                        <h1>Admin</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}">
                            <p id="invalid-email" class="text-danger text-left" hidden><span>*</span>{{ translate('Invalid email format') }}</p>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">{{ translate('Sign In') }}</button>
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

@section('js')

    <script>
        // validate email format
        $('input[name="email"]').on('input', function () {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var inputValue = $('input[name="email"]').val();

            if (mailformat.test(inputValue) || inputValue === '') {
                $('#invalid-email').hide();
                $('button').prop('disabled', false);
            } else {
                $('#invalid-email').show();
                $('button').prop('disabled', true);
            }
        });
    </script>

@endsection
