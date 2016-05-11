$(function () {
    $('form[name="fos_user_login_form"]').submit(function () {
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (data) {
                window.open("/", "_self");
            },
            error: function (data) {
                var response = data.responseText;
                $('.error').html(response);
            }
        });
        return false;
    });
});