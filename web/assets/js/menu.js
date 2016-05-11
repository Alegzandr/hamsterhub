$(function () {
    $('.menu-icon').click(function () {
        if ($('nav').is('#open')) {
            $('header, main, footer').animate({
                marginLeft: '0'
            });
            $('nav').animate({
                left: '-150px'
            }, 200);

            $('nav').removeAttr('id');
        } else {
            $('.mask').fadeIn();
            $('header, main, footer').animate({
                marginLeft: '150px'
            });
            $('nav').animate({
                left: '0'
            }, 200);

            $('nav').attr('id', 'open');
        }
    });

    $('.mask').click(function () {
        if ($('nav').is('#open')) {
            $('header, main, footer').animate({
                marginLeft: '0'
            });
            $('nav').animate({
                left: '-150px'
            }, 200);

            $('nav').removeAttr('id');
        }
    });
});
