$(document).ready(function () {
    var position = 0;
    var btn_position = 0;
    $('.slide_btn').find('.sbtn').each(function (index) {
        $(this).click(function () {
            if (index == 0) {
                position = 0;
                btn_position = 0
            } else if (index == 1) {
                position = -340;
                btn_position = 80
            } else if (index == 2) {
                position = -680;
                btn_position = 160
            } else if (index == 3) {
                position = -1020;
                btn_position = 240
            }
            $('.attr_list').animate({
                left: position
            }, 500).clearQueue();
            $('#content .attraction .slide_btn .mbtn').animate({
                left: btn_position
            }, 500).clearQueue()
        })
    })
});