$(document).ready(function () {
    var tbContent = $('.info .tab_menu li a.current').attr('href');
    tbContent = tbContent.replace('#', ' #');
    $('.info_container').load(tbContent);
    $('.info .tab_menu li a').on('click', function (e) {
        e.preventDefault();
        tbContent = $(this).attr('href');
        tbContent = tbContent.replace('#', ' #');
        $('.info_container').load(tbContent);
        $('.tab_menu li a').removeClass('current');
        $(this).addClass('current');
    })
})