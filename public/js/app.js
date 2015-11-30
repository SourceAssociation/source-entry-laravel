$(function(){
    // 登录
    $('.submit-login-btn').on('click', function () {
        var modal = UIkit.modal("#spinner", {
            bgclose:false
        });
        if ( modal.isActive() ) {
            modal.hide();
        } else {
            modal.show();
            var _token = $('#login').find('input[name=_token]').val(),
                email = $('#login').find('#email').val(),
                password = $('#login').find('#password').val(),
                remember = $('#login').find('#remember').prop('checked') ? 1 : 0;
            $.post('/ajax/login', {
                _token: _token,
                email: email,
                password: password,
                remember: remember
            }, function(data, textStatus, xhr) {
                if (data.error) {
                    modal.hide();
                    UIkit.notify({
                        message : "<i class='uk-icon-info'></i> " + data.msg,
                        status  : 'warning',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                }else{
                    window.location.href = "/center";
                }
            });
        }
    });

    // 注册
    $('.submit-register-btn').on('click', function(){
        var modal = UIkit.modal("#spinner", {
            bgclose:false
        });
        if ( modal.isActive() ) {
            modal.hide();
        } else {
            modal.show();
            var _token = $('#register').find('input[name=_token]').val(),
                name = $('#register').find('#name').val(),
                email = $('#register').find('#email').val(),
                password = $('#register').find('#password').val(),
                password_confirmation = $('#register').find('#password_confirmation').val();
            $.post('/ajax/register', {
                _token: _token,
                name: name,
                email: email,
                password: password,
                password_confirmation: password_confirmation
            }, function(data, textStatus, xhr) {
                if (data.error) {
                    modal.hide();
                    for (var i = 0; i < data.msg.length; i++) {
                        UIkit.notify({
                            message : "<i class='uk-icon-info'></i> " +data.msg[i].value,
                            status  : 'danger',
                            timeout : 2000,
                            pos     : 'top-center'
                        });
                    };
                }else{
                    window.location.href = "/auth/login";
                }
            });
        }
    })
});