<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <title>{{ $title }} - @yield('title', '主页')</title>

    <link rel="stylesheet" type="text/css" href="/uikit/css/uikit.almost-flat.min.css">
    <link rel="stylesheet" type="text/css" href="/uikit/css/components/form-password.almost-flat.min.css">
    <link rel="stylesheet" type="text/css" href="/uikit/css/components/notify.almost-flat.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/uikit/js/uikit.min.js"></script>
    <script src="/uikit/js/components/form-password.min.js"></script>
    <script src="/uikit/js/components/notify.min.js"></script>
    <script src="/js/center.js"></script>

</head>
<body>

    <div class="uk-margin uk-text-contrast uk-text-center uk-flex uk-flex-center uk-flex-middle" data-uk-parallax="{bg: '-200'}" style="height: 350px; background-image: url(/img/center_bg.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;">
        <div class="uk-width-medium-1-2">
            <h1 class="uk-text-contrast">Heading</h1>
            <p class="uk-text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>

    <div class="uk-container uk-container-center">

        @yield('content')

    </div>

</body>
</html>