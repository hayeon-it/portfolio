$(document).ready(function () {
   var timeonoff;
   var cnt = 1;
   var imageCount = 4;
   var direct = 1;
   var position = 0;
   var onoff = true;
   
   $('.btn1').css({
      'background': '#fe4365',
      'width': '36px'
   });

   function move() {
      cnt += direct;
      if (cnt == 1) {
         position = 0;
         direct = 1
      } else if (cnt == 2) {
         position = -2000
      } else if (cnt == 3) {
         position = -4000;
      } else if (cnt == 4) {
         position = -6000;
         direct = -1
      }
      $('.mbutton').css({
         'background': 'rgba(255,255,255,.6)',
         'width': '18px'
      });
      $('.btn' + cnt).css({
         'background': '#fe4365',
         'width': '36px'
      });
      $('.visual').animate({
         left: position
      }, 'slow');
   }
   
   timeonoff = setInterval(move, 5000);
   
   $('.mbutton').each(function (index) {
      $(this).click(function () {
         clearInterval(timeonoff);
         $('.mbutton').css({
            'background': 'rgba(255,255,255,.6)',
            'width': '18px'
         });
         if (index == 0) {
            $('.visual').animate({
               left: 0
            }, 'slow');
            direct = 1;
            cnt = 1
         } else if (index == 1) {
            $('.visual').animate({
               left: -2000
            }, 'slow');
            cnt = 2
         } else if (index == 2) {
            $('.visual').animate({
               left: -4000
            }, 'slow');
            cnt = 3
         } else if (index == 3) {
            $('.visual').animate({
               left: -6000
            }, 'slow');
            direct = -1;
            cnt = 4
         }
         $('.btn' + cnt).css({
            'background': '#fe4365',
            'width': '36px'
         });
         timeonoff = setInterval(move, 5000);
         if (onoff == false) {
            onoff = true;
            $('.ps').css({
               'background': 'url(images/pause1.png) no-repeat',
               'background-size': '18px'
            });
         }
      })
   })
   $('.ps').click(function () {
      if (onoff == true) {
         $('.ps').css({
            'background': 'url(images/play1.png) no-repeat',
            'background-size': '18px'
         });
         clearInterval(timeonoff);
         onoff = false
      } else if (onoff == false) {
         $('.ps').css({
            'background': 'url(images/pause1.png) no-repeat',
            'background-size': '18px'
         });
         timeonoff = setInterval(move, 5000);
         onoff = true
      }
   })
});