$(function () {
    $('form[name="fos_user_login_form"').submit(function () {
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (data) {
                var loginError;
                if (data.message == 'Bad credentials.') {
                    loginError = "Vos identifiants n'ont pas été reconnus";
                    $('.error').html(loginError);
                }
                else {
                    window.open("/", "_self");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    });
});