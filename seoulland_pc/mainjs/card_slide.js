$(document).ready(function () {
    var position = 0;
    var movesize = 400;
    $('.card_list').after($('.card_list').clone());
    $('.card .button').click(function (event) {
        var $target = $(event.target);
        if ($target.is('.m2 i')) {
            position -= movesize;
            if (position == -800) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(2).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(3).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(4).addClass('next').find('dl').addClass('hide');
            } else if (position == -400) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(1).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(2).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(3).addClass('next').find('dl').addClass('hide');
            } else if (position == 0) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(0).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(1).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(2).addClass('next').find('dl').addClass('hide');
            } else if (position == -1200) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(3).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(4).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(5).addClass('next').find('dl').addClass('hide');
            } else if (position == -1600) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(4).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(5).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(6).addClass('next').find('dl').addClass('hide');
            } else if (position == -2000) {
                $('.card_list li').removeClass('prev');
                $('.card_list li').removeClass('current');
                $('.card_list li').removeClass('next');
                $('.card_list li').eq(5).addClass('prev').find('dl').addClass('hide');
                $('.card_list li').eq(6).addClass('current').find('dl').removeClass('hide');
                $('.card_list li').eq(7).addClass('next').find('dl').addClass('hide');
            }
            $('.card_slide').stop().animate({
                    left: position
                }, 500,
                function () {
                    if (position == -2400) {
                        $('.card_list li').removeClass('prev');
                        $('.card_list li').removeClass('current');
                        $('.card_list li').removeClass('next');
                        $('.card_list li').eq(0).addClass('prev').find('dl').addClass('hide');
                        $('.card_list li').eq(1).addClass('current').find('dl').removeClass('hide');
                        $('.card_list li').eq(2).addClass('next').find('dl').addClass('hide');
                        $('.card_slide').css('left', 0);
                        position = 0;
                    }
                }).clearQueue();
        }
    })
})