$(document).ready(function () {

    $('.contlist').hide();
    $('.contlist:eq(0)').show();
    $('.tab_menu .tab').removeClass('current');
    $('.tab_menu .tab1').addClass('current');
    $('.attr_map:eq(0)').find('img').attr('id', 'draggable').addClass('ui-widget-content');
    $("#draggable").draggable({});

    $('.tab_menu .tab').each(function (index) {
        $(this).click(function () {
            $('.contlist').hide();
            $('.contlist:eq(' + index + ')').show();
            $('.tab_menu .tab').removeClass('current');
            $(this).addClass('current');

            for (var i = 0; i <= 2; i++) {
                if (index == i) {
                    $('.attr_map ol li a').removeClass('current').eq(7 * i).addClass('current');
                    $('.attr_map img').attr('src', 'images/content1/map_' + (7 * (i + 1) - 6) + '.jpg').removeAttr('id').removeClass('ui-widget-content'); // 각 나라의 첫번째 지도 이미지로 교체
                    $('.attr_map').eq(i).find('img').attr('id', 'draggable').addClass('ui-widget-content');
                    $("#draggable").draggable({});
                }

                $('.attr_map img').css({
                    'left': '0',
                    'top': '0',
                    'transform': 'scale(1)'
                });
            }

            if (index == 0) {
                ps = '회전목마';
            } else if (index == 1) {
                ps = '스카이엑스';
            } else if (index == 2) {
                ps = '킹바이킹';
            }
            $('.attr_map .map_img img').attr('alt', "'" + ps + ' 위치정보');

        })
    })

    var ps = '';

    $('.attr_map ol li').each(function (index) {
        $(this).click(function () {
            if (index == 0) {
                ps = '회전목마';
            } else if (index == 1) {
                ps = '또봇트레인';
            } else if (index == 2) {
                ps = '라바트위스터';
            } else if (index == 3) {
                ps = '구름빵';
            } else if (index == 4) {
                ps = '월드컵';
            } else if (index == 5) {
                ps = '카트라이더범퍼';
            } else if (index == 6) {
                ps = '피터팬';
            } else if (index == 7) {
                ps = '스카이엑스';
            } else if (index == 8) {
                ps = '블랙홀2000';
            } else if (index == 9) {
                ps = '은하열차888';
            } else if (index == 10) {
                ps = '엑스플라이어';
            } else if (index == 11) {
                ps = '달나라열차';
            } else if (index == 12) {
                ps = '춤추는요술집';
            } else if (index == 13) {
                ps = '록카페';
            } else if (index == 14) {
                ps = '킹바이킹';
            } else if (index == 15) {
                ps = '해적소굴';
            } else if (index == 16) {
                ps = '니나노고카트';
            } else if (index == 17) {
                ps = '급류타기';
            }

            $('.attr_map .map_img img').attr('alt', "'" + ps + ' 위치정보');
            $('.attr_map img').attr('src', 'images/content1/map_' + (index + 1) + '.jpg').css({
                'left': '0',
                'top': '0',
                'transform': 'scale(1)',
                'transition': 'none'
            });
            $('.attr_map ol li a').removeClass('current').eq(index).addClass('current');
        });
    });

    $('.attr_map .plus').click(function () {
        $('.attr_map img').css({
            'transform': 'scale(1.5)',
            'transition': 'all .3s'
        })
    })

    $('.attr_map .minus').click(function () {
        $('.attr_map img').css({
            'left': '0',
            'top': '0',
            'transform': 'scale(1)',
            'transition': 'none'
        });
    })



    var purl = window.location;
    tmp = String(purl).split('?');

    if (tmp[1]) {
        tmp2 = tmp[1].split('=');

        for (var j = 1; j <= 3; j++) {

            if (tmp2[1] == j) {
                $('.contlist').hide();
                $('.contlist').eq(j - 1).show();
                $('.tab_menu .tab').removeClass('current');
                $('.tab_menu .tab' + j).addClass('current');
                $('.attr_map img').attr('src', 'images/content1/map_' + (7 * (j - 1) + 1) + '.jpg').removeAttr('id').removeClass('ui-widget-content');
                $('.attr_map').eq(j - 1).find('img').attr('id', 'draggable').addClass('ui-widget-content');
                $("#draggable").draggable({});
            }
        }

        if (tmp2[1]) {
            $("html, body").stop().animate({
                "scrollTop": 1400
            }, 500)
        }
    }

});