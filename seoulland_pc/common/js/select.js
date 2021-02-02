$(document).ready(function () {
    $('.family_site .arrow').toggle(function () {
        $('.family_site .family_list').show();
        $('.family_site .arrow span i').removeClass('fas fa-chevron-down').addClass('fas fa-chevron-up');
    }, function () {
        $('.family_site .family_list').hide();
        $('.family_site .arrow span i').removeClass('fas fa-chevron-up').addClass('fas fa-chevron-down');
    })
    $('.family_site .arrow').on('focus', function () {
        $('.family_site .family_list').show();
    })
    $('.family_site .family_list li:last').find('a').on('blur', function () {
        $('.family_site .family_list').hide();
    })
})