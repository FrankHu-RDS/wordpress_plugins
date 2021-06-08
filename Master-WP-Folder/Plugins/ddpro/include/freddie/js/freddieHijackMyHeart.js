(function ($) {
    if($('.freddie_hijack_my_heart ').length !== 0) {
        $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
    }
   //create arrow icon
   $('.freddie_hijack_my_heart .fullwidth-menu > li > a').append('<div class="freddie-hmh-arrows"><div class="freddie-hmh-arrow freddie-hmh-arrow-01"></div><div class="freddie-hmh-arrow freddie-hmh-arrow-02"></div><div class="freddie-hmh-arrow freddie-hmh-arrow-03"></div></div>')

   //create overlay
   $('.freddie_hijack_my_heart_container').append('<div id="freddie-hmh-overlay"></div>');

   //create spans for menu items
   $('.freddie_hijack_my_heart .fullwidth-menu > li > a').wrapInner('<span></span>');

   //social media bar, auto position
   // var menuHeight = $('.freddie_hijack_my_heart .fullwidth-menu').height();
   // $('.freddie-hijack-my-heart-social-media').css('top', 'calc(10vh + 80px)');
   // $('.freddie-hijack-my-heart-social-media').css('margin-top', menuHeight);


    $('.freddie-hijack-my-heart-social-media').appendTo($('.freddie_hijack_my_heart'));


   //open menu
   function openMenuHijack() {
      $('.freddie_hijack_my_heart_container').addClass('opened');

         var hijackMenuBg = $('.freddie_hijack_my_heart');
         var hijackMenu = $('.freddie_hijack_my_heart .fullwidth-menu');
         var hijackSocMed = $('.freddie-hijack-my-heart-social-media');
         var hijackOverlay = $('#freddie-hmh-overlay');

         $('.freddie_menu_hijack_my_heart_logo.white').hide();
         $('.freddie_menu_hijack_my_heart_logo.black').show();

         TweenMax.to(hijackMenuBg, 0.4, {
            left: "0"
         })
         TweenMax.to(hijackMenu, 0.3, {
            display: "block"
         });
         TweenMax.to(hijackSocMed, 0.3, {
            opacity: 1,
            delay: 0.5
         });
         TweenMax.to(hijackOverlay, 0.3, {
             left: "0",
             opacity: 1
         });
   }

   //close menu
   function closeMenuHijack() {

         var hijackMenuBg = $('.freddie_hijack_my_heart');
         var hijackMenu = $('.freddie_hijack_my_heart .fullwidth-menu');
         var hijackSocMed = $('.freddie-hijack-my-heart-social-media');
         var hijackOverlay = $('#freddie-hmh-overlay');

         $('.freddie_menu_hijack_my_heart_logo.white').show();
         $('.freddie_menu_hijack_my_heart_logo.black').hide();

         $('.freddie_hijack_my_heart_container').removeClass('opened');

         TweenMax.to(hijackMenuBg, 0, {
            left: "-100%",

         });
         TweenMax.to(hijackMenu, 0, {
            display: "none"
         });
         TweenMax.to(hijackSocMed, 0, {
            opacity: 0
         });


       TweenMax.to(hijackOverlay, 0.3, {
           left: "101%",
           opacity: 0
       })
       TweenMax.to(hijackOverlay, 0, {
             left: "-101%",
           delay: 0.5
         });


     }

   //form close icon
   function menu_transform(){
         var line1 = $('.line_01');
         var line2 = $('.line_02');
         var line3 = $('.line_03');

         TweenMax.to(line1, 0.3, {
            rotation: '-45',
            y: 9
         });
         TweenMax.to(line2, 0.3, {
             rotation: '45',
             y: 2.5
         });
         TweenMax.to(line3, 0.3, {
            opacity: 0
         });
   }

   //revert menu icon to default
   function menu_revert() {
      var line1 = $('.line_01');
      var line2 = $('.line_02');
      var line3 = $('.line_03');

      TweenMax.to(line1, 0.3, {
          rotation: '0',
          y: 0
      });
      TweenMax.to(line2, 0.3, {
          rotation: '0',
          y: 0
      });
      TweenMax.to(line3, 0.3, {
         opacity: 1
      });
   }

   //menu click
   $('.freddie_hijack_my_heart_container .freddie_menu_icon').on('click', function() {
      if (!$('.freddie_hijack_my_heart_container').hasClass('opened')) {
         openMenuHijack();
         menu_transform();
      } else if ( $('.freddie_hijack_my_heart_container').hasClass('opened') ) {
         closeMenuHijack();
         menu_revert();
      }
   });

   //menu item hover
   $('.freddie_hijack_my_heart .fullwidth-menu a').each(function() {
      $(this).hover(function() {
         var arr_line1 = $(this).parent().find('.freddie-hmh-arrow-01');
         var arr_line2 = $(this).parent().find('.freddie-hmh-arrow-02');
         var arr_line3 = $(this).parent().find('.freddie-hmh-arrow-03');

         TweenMax.to(arr_line1, 0.3, {
             width: "20px",
             transformOrigin: "right center"
         });
         TweenMax.to(arr_line2, 0.3, {
             width: "20px",
             transformOrigin: "right center"
         });
         TweenMax.to(arr_line3, 0.3, {
            width: "50px"
         });

      }, function() {
         var arr_line1 = $('.freddie-hmh-arrow-01');
         var arr_line2 = $('.freddie-hmh-arrow-02');
         var arr_line3 = $('.freddie-hmh-arrow-03');

         TweenMax.to(arr_line1, 0.2, {
             width: "0px",
             transformOrigin: "right center"
         });
         TweenMax.to(arr_line2, 0.2, {
             width: "0px",
             transformOrigin: "right center"
         });
         TweenMax.to(arr_line3, 0.2, {
            width: "0px"
         });

      });
   });


})(jQuery);