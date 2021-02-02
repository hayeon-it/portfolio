$(document).ready(function () {
    var cnt = $('.tab_menu .tab').length;
    $('.contlist:eq(0)').show();
    $('.tab_menu .tab1').addClass('current');
    $('.tab_menu .tab').each(function (index) {
        $(this).click(function () {
            $('.contlist').hide();
            $('.contlist:eq(' + index + ')').show();

            for (var i = 1; i <= cnt; i++) {
                $('.tab_menu .tab' + i).removeClass('current');
            }
            $(this).addClass('current');
        });
    });
});