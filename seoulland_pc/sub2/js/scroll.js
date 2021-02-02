$(document).ready(function () {

    var h1 = $('.festival_list>li:eq(0)').offset().top - 500;
    var h2 = $('.festival_list>li:eq(1)').offset().top - 500;
    var h3 = $('.festival_list>li:eq(2)').offset().top - 500;
    var h4 = $('.festival_list>li:eq(3)').offset().top - 500;

    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();

        if (scroll >= h1 && scroll < h2) {
            $('.festival_list>li').eq(0).addClass('boxMove1');
        } else if (scroll >= h2 && scroll < h3) {
            $('.festival_list>li').eq(1).addClass('boxMove2');
        } else if (scroll >= h3 && scroll < h4) {
            $('.festival_list>li').eq(2).addClass('boxMove1');
        } else if (scroll >= h4) {
            $('.festival_list>li').eq(3).addClass('boxMove2');
        }
    })

})