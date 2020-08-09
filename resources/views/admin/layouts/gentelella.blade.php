<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ translate('Admin panel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="nav-md">

@yield('body')

<script src="{{ mix('js/admin.js') }}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    
    // validate email format
    $('input[name="email"]').on("input", function () {

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var inputValue = $('input[name="email"]').val();

        if (inputValue.match(mailformat) || inputValue == "") {
            $("#invalid-email").hide();
            $("button").prop("disabled", false);
        } else {
            $("#invalid-email").show();
            $("button").prop("disabled", true);
        }
    });
</script>
@yield('js')
</body>
</html>
