$(function(){
    var _token = $('input[name=_token]').val();
    $('.uk-overlay-icon').on('click', function(){
        window.location.href = "center/avatar";
    });

    $('#user_name').change(function () {
        updateInfos('name', $.trim($(this).val()));
    });

    $('#user_email').change(function () {
        updateInfos('email', $.trim($(this).val()));
    });

    function updateInfos(key, value) {
        $.post('ajax/center/update', {
            _token: _token,
            key: key,
            value: value
        }, function(data, textStatus, xhr) {
            var status = 'danger';
            if (data.error) {
                status = 'success';
            };
            UIkit.notify({
                message : "<i class='uk-icon-info'></i> " + data.msg,
                status  : status,
                timeout : 2000,
                pos     : 'top-right'
            });
        });
    }
});