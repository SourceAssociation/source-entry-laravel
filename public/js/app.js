$(function(){
    $('.submit-login-btn').on('click', function () {
        var modal = UIkit.modal("#spinner", {
            bgclose:false
        });
        if ( modal.isActive() ) {
            modal.hide();
        } else {
            modal.show();
        }
    });
});