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
    <link rel="stylesheet" type="text/css" href="/uikit/css/components/notify.almost-flat.min.css">
    <link rel="stylesheet" type="text/css" href="/cropper/cropper.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/uikit/js/uikit.min.js"></script>
    <script src="/uikit/js/components/notify.min.js"></script>
    <script type="text/javascript" src="/cropper/cropper.min.js"></script>

    <script src="/js/avatar.js"></script>

</head>
<body>
    @yield('header')

    <div class="uk-container uk-container-center">

        @yield('content')

    </div>

    @include('layouts.footer')

    {!! csrf_field() !!}
</body>
</html>