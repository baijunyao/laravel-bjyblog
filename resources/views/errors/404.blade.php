<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404页面-{{ config('app.name') }}</title>
    <style>
        #box{
            margin: 0 auto;
            width: 540px;
            height: 540px;
        }
        p{
            margin-bottom: 60px;
            width: 540px;
            height: 20px;
            text-align: center;
            line-height: 20px;
        }
        #mes{
            font-size: 30px;
            color: red;
        }
        .hint{
            color: #999;
        }
        a{
            color: #259AEA;
        }
    </style>
    <script>
        var i = 5;
        var intervalid;
        intervalid = setInterval("fun()", 1000);
        function fun() {
            if (i == 0) {
                window.location.href = "/";
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
    </script>
</head>
<body>
<div id="box">
    <img src="{{ asset('images/home/404.jpg') }}" alt="404">
    <p>将在 <span id="mes">5</span> 秒钟后返回<a href="/">{{ config('app.name') }}</a>首页</p>
    <p class="hint">非常抱歉 - 您可能输入了错误的网址，或者该网页已删除或移动</p>
</div>
</body>
</html>
