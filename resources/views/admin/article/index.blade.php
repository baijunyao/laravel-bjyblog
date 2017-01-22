<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('statics/prism/prism.min.css') }}" />
</head>
<body>

<dvi class="box">
{{ htmlspecialchars($article->content) }}
</dvi>

<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('statics/prism/prism.min.js') }}"></script>
<script src="{{ asset('statics/editormd/lib/marked.min.js') }}"></script>
<script>
    {{--var str = '</script>';--}}
    var str = $('.box').text();
    console.log(str);
    marked.setOptions({
        sanitize: true,

    })
    var str = marked(str);
    console.log(str);
    $('.box').html(str);
    $('pre').addClass('line-numbers');
</script>
</body>
</html>