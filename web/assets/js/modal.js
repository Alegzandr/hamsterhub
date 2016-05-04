$(function () {
    $('#register').click(function () {
        var form = 'form[name="fos_user_registration_form"]';

        $('form[name="fos_user_login_form"]').hide();
        $('form[name="upload"]').hide();
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
        $('form[name="upload"]').hide();
        if ($(form).css('display') === 'none') {
            $(form).show();
        }
        else {
            $(form).hide();
        }
    });

    $('#upload').click(function () {
        var form = 'form[name="upload"]';

        $('form[name="fos_user_login_form"]').hide();
        $('form[name="fos_user_registration_form"]').hide();
        if ($(form).css('display') === 'none') {
            $(form).show();
        }
        else {
            $(form).hide();
        }
    });
});
