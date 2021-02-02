$(document).ready(function () {
    $('ul.dropdownmenu').hover(function () {
        $('ul.dropdownmenu li.menu ul').stop().fadeIn('normal');
        $('.menu_box').stop().slideDown('fast');
        $('.menu_box').css('position', 'fixed');
    }, function () {
        $('ul.dropdownmenu li.menu ul').stop().fadeOut('fast');
        $('.menu_box').stop().slideUp('normal');
    });

    $('ul.dropdownmenu li.menu').hover(function () {
            $('a.depth1', this).animate({
                top: -20
            }, 'fast').clearQueue();
        },
        function () {
            $('a.depth1', this).animate({
                top: 0
            }, 'fast').clearQueue();
        });

    $('ul.dropdownmenu li.menu .depth1').on('focus', function () {
        $('ul.dropdownmenu li.menu ul').slideDown('fast');
        $('.menu_box').slideDown('fast');
    });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('.menu_box').slideUp('fast');
    });

});