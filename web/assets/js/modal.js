$(function () {
    $('#register').click(function () {
        $('.login-popup').hide();
        $('.upload-popup').hide();

        if ($('.register-popup').css('display') === 'none') {
            $('.register-popup').fadeIn();
            $('.mask').fadeIn();
        }
        else {
            $('.register-popup').fadeOut();
            $('.mask').fadeOut();
        }
    });

    $('#login').click(function () {
        $('.register-popup').hide();
        $('.upload-popup').hide();

        if ($('.login-popup').css('display') === 'none') {
            $('.login-popup').fadeIn();
            $('.mask').fadeIn();
        }
        else {
            $('.login-popup').fadeOut();
            $('.mask').fadeOut();
        }
    });

    $('#upload').click(function () {
        if ($('.upload-popup').css('display') === 'none') {
            $('.upload-popup').fadeIn();
            $('.mask').fadeIn();
        }
        else {
            $('.upload-popup').fadeOut();
            $('.mask').fadeOut();
        }
    });

    $('.mask').click(function () {
        $('.register-popup').fadeOut();
        $('.login-popup').fadeOut();
        $('.upload-popup').fadeOut();
        $('.mask').fadeOut();
    });

    $('.mask').click(function () {
        $('.register-popup').fadeOut();
        $('.login-popup').fadeOut();
        $('.upload-popup').fadeOut();
        $('.mask').fadeOut();
    });

    $('.quit').click(function () {
        $('.register-popup').css('display', 'none');
        $('.login-popup').css('display', 'none');
        $('.upload-popup').css('display', 'none');
        $('.mask').fadeOut();
    });

    $('.crud').on('click', function (e) {
        var link = this;

        e.preventDefault();

        $('<div>Êtes vous sûr ?<hr></div>').dialog({
            buttons: {
                'Valider': function () {
                    window.location = link.href;
                },
                'Annuler': function () {
                    $(this).dialog('close');
                }
            }
        });
    });
});
