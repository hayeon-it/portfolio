$(document).ready(function () {

    $('.ticket_info li a').click(function (event) {

        var $target = $(event.target);

        if ($target.hasClass('btn1')) {
            $('.ticket_info li').eq(0).animate({
                left: 0
            }, 500).clearQueue();
            $('.ticket_info li').eq(1).animate({
                left: 660
            }, 500).clearQueue();
            $('.ticket_info li').eq(2).animate({
                left: 840
            }, 500).clearQueue();
            $('.ticket_info li').eq(3).animate({
                left: 1020
            }, 500).clearQueue();
        } else if ($target.hasClass('btn2')) {
            $('.ticket_info li').eq(0).animate({
                left: 0
            }, 500).clearQueue();
            $('.ticket_info li').eq(1).animate({
                left: 180
            }, 500).clearQueue();
            $('.ticket_info li').eq(2).animate({
                left: 840
            }, 500).clearQueue();
            $('.ticket_info li').eq(3).animate({
                left: 1020
            }, 500).clearQueue();
        } else if ($target.hasClass('btn3')) {
            $('.ticket_info li').eq(0).animate({
                left: 0
            }, 500).clearQueue();
            $('.ticket_info li').eq(1).animate({
                left: 180
            }, 500).clearQueue();
            $('.ticket_info li').eq(2).animate({
                left: 360
            }, 500).clearQueue();
            $('.ticket_info li').eq(3).animate({
                left: 1020
            }, 500).clearQueue();
        } else if ($target.hasClass('btn4')) {
            $('.ticket_info li').eq(0).animate({
                left: 0
            }, 500).clearQueue();
            $('.ticket_info li').eq(1).animate({
                left: 180
            }, 500).clearQueue();
            $('.ticket_info li').eq(2).animate({
                left: 360
            }, 500).clearQueue();
            $('.ticket_info li').eq(3).animate({
                left: 540
            }, 500).clearQueue();
        }

    })
})