$(function () {
    $('form[name="upload"]').submit(function () {
        $('.upload-errors').html('&nbsp;');
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: 'data',
            data: $(this).serialize(),
            success: function (data) {
                $('.upload-popup').fadeOut();
                window.open("/", "_self");
            },
            error: function (data) {
                console.log('error');
                String.prototype.removeChar = function () {
                    return this.substring(2, this.length - 2);
                }
                if (data.responseJSON.url) {
                    $('.url-error').html(((JSON.stringify(data.responseJSON.url)).removeChar()));
                }

                if (data.responseJSON.title) {
                    $('.title-error').html(((JSON.stringify(data.responseJSON.title)).removeChar()));
                }

                if (data.responseJSON.description) {
                    $('.description-error').html(((JSON.stringify(data.responseJSON.description)).removeChar()));
                }
            }
        });

        return false;
    });
});
