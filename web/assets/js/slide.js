$(function () {

    $('.menu-icon').click(function () {

        if ($('.slide-menu').is('#open')) {
            $('body').animate({
                marginLeft: '-=150px'
            }, 200)
            $('.left-nav').animate({
                right: '15px'
            }, 200)
            $('.slide-menu').animate({
                left: '-=150px'
            }, 200)
            setTimeout(function () {
                $('.slide-menu').removeAttr('id');
            }, 50);
        }
        else {
            $('body').animate({
                marginLeft: '+=150px'
            }, 200)
            $('.left-nav').animate({
                right: '-125px'
            }, 200)
            $('.slide-menu').animate({
                left: '+=150px'
            }, 200)

            setTimeout(function () {
                $('.slide-menu').attr('id', 'open');
            }, 50);
        }
    })
})
