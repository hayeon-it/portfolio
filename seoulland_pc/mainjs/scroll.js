$(document).ready(function () {
    var hg = [];
    $('#content>div').each(function (index) {
        hg[index] = $(this).offset().top - 600
    });
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll >= hg[0] && scroll < hg[1]) {
            $('#content h3').eq(0).addClass('moveBox');
        } else if (scroll >= hg[1] && scroll < hg[2]) {
            $('#content h3').eq(1).addClass('moveBox');
            $('#content p').eq(0).addClass('moveBox');
            $('#content .promo_list').addClass('moveBox');
            $('#content .more_btn').eq(0).addClass('moveBox');
        } else if (scroll >= hg[2] && scroll < hg[3]) {
            $('#content h3').eq(2).addClass('moveBox');
            $('#content p').eq(1).addClass('moveBox');
            $('#content .attr_box').addClass('moveBox');
            $('#content .slide_btn').addClass('moveBox');
        } else if (scroll >= hg[3] && scroll < hg[4]) {
            $('#content h3').eq(3).addClass('moveBox');
            $('#content .card_list').addClass('moveBox');
            $('#content .card .button').addClass('moveBox');
            $('#content .more_btn').eq(1).addClass('moveBox');
        } else if (scroll >= hg[4] && scroll < hg[5]) {
            $('#content h3').eq(4).addClass('moveBox');
            $('#content .tab_menu').addClass('moveBox');
            $('#content .info_container').addClass('moveBox');
        } else if (scroll >= hg[5]) {
            $('#content h3').eq(5).addClass('moveBox');
            $('#content .event_list').addClass('moveBox');
        }
    })

})