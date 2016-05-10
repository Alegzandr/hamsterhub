$(function () {
    $('.errors').remove();

    $('form[name="upload"]').submit(function () {
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (data) {
                console.log('success');
                console.log(data);
            },
            error: function (data) {
                console.log('error');
                console.log(data);
            }
        });

        return false;
    });
});
