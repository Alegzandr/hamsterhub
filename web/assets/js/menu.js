$(function () {
    function open() {
        $('.mask').fadeIn();
        $('header, main, footer').animate({
            marginLeft: '150px'
        });
        $('nav').animate({
            left: '0'
        }, 200);

        $('nav').attr('id', 'open');
    }
    function close() {
        $('header, main, footer').animate({
            marginLeft: '0'
        });
        $('nav').animate({
            left: '-150px'
        }, 200);

        $('nav').removeAttr('id');
    }

    $('.menu-icon').click(function () {
        if ($('nav').is('#open')) {
            close();
        } else {
            open();
        }
    });

    $('.mask').click(function () {
        if ($('nav').is('#open')) {
            close();
        }
    });

    $('nav > ul > li > a').click(function () {
        if ($('nav').is('#open')) {
            close();
        }
    });
});
