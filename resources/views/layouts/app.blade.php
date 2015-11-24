<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <title>{{ config('params.copy')." — ".config('params.title') }}</title>

    <link rel="stylesheet" type="text/css" href="/uikit/css/uikit.almost-flat.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <div class="uk-cover-background uk-position-relative wrapper">
        <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle">

            @yield('content')

        </div>
    </div>
</body>
</html>