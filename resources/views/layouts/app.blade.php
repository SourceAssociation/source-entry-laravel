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
    <script src="/js/app.js"></script>

</head>
<body style="background: url({{ $image }}) 50% 50%">
    <div class="uk-cover-background uk-position-relative wrapper">
        <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle">

            @yield('content')

        </div>
    </div>

    <div id="login" class="uk-modal">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-modal-header">
                {{ $title }}
            </div>
            <form class="uk-form uk-text-center">
                {!! csrf_field() !!}
                <div class="uk-form-row">
                    <label>
                        邮箱:
                        <input type="text" id="email" placeholder="请输入邮箱">
                    </label>
                </div>
                <div class="uk-form-row">
                    <label class="">
                        密码:
                        <div class="uk-form-password">
                            <input type="password" id="password" placeholder="请输入密码">
                            <a href="javascript:void(0);" class="uk-form-password-toggle" data-uk-form-password="{lblShow:'<i class=uk-icon-eye-slash></i>', lblHide:'<i class=uk-icon-eye></i>'}"><i class="uk-icon-eye-slash"></i></a>
                        </div>
                    </label>
                </div>
                <div class="uk-form-row">
                    <label><input type="checkbox" id="remember" value="1"> 记住密码？</label>
                </div>
            </form>
            <div class="uk-modal-footer uk-text-center">
                <button type="button" class="uk-button submit-login-btn">登录</button>
            </div>
        </div>
    </div>

    <div id="spinner" class="uk-modal">
        <div class="uk-modal-dialog">
            <div class="uk-modal-spinner"></div>
        </div>
    </div>
</body>
</html>