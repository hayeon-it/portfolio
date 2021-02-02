$(document).ready(function () {
    var topHeight = $('.visual_box').height();
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        $('.text').text(scroll);

        if (scroll >= topHeight) {
            $('a.topMove').fadeIn('slow');
        } else {
            $('a.topMove').fadeOut('fast');
        }
    })
    $('.topMove').click(function () {
        $("html,body").stop().animate({
            "scrollTop": 0
        }, 1000);
    });
})