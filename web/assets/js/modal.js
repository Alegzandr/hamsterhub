$(function () {
    $('#register').click(function () {
        var form = 'form[name="fos_user_registration_form"]';

        $('form[name="fos_user_login_form"]').hide();
        if ($(form).css('display') === 'none') {
            $(form).show();
        }
        else {
            $(form).hide();
        }
    });

    $('#login').click(function () {
        var form = 'form[name="fos_user_login_form"]';

        $('form[name="fos_user_registration_form"]').hide();
        if ($(form).css('display') === 'none') {
            $(form).show();
        }
        else {
            $(form).hide();
        }
    });
});
