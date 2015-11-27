$(function(){
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
                        message : "<i class='uk-icon-check'></i>" + data.msg,
                        status  : 'warning',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    // UIkit.modal('#login').show();
                };
            });
        }
    });

});