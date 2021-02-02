$(document).ready(function () {
    $('.restaurant_list:eq(0)').find('li .more').each(function (index) {
        $(this).click(function () {
            $('.md' + (index + 1)).fadeIn(5);
            $('.modal_box').fadeIn('normal');
        })

        $('.closeBtn, .modal_box').click(function () {
            $('.md' + (index + 1)).fadeOut(5);
            $('.modal_box').fadeOut('fast');
        })
    });

    $('.restaurant_list:eq(1)').find('li .more').each(function (index) {
        $(this).click(function () {
            $('.md' + (index + 1)).fadeIn(5);
            $('.modal_box').fadeIn('normal');
        })

        $('.closeBtn, .modal_box').click(function () {
            $('.md' + (index + 1)).fadeOut(5);
            $('.modal_box').fadeOut('fast');
        })
    });

    $('.restaurant_list:eq(2)').find('li .more').each(function (index) {
        $(this).click(function () {
            $('.md' + (index + 1)).fadeIn(5);
            $('.modal_box').fadeIn('normal');
        })

        $('.closeBtn, .modal_box').click(function () {
            $('.md' + (index + 1)).fadeOut(5);
            $('.modal_box').fadeOut('fast');
        })
    });

})
