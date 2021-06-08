 (function($) {
      var testimonialsCount = $('body #page-container .freddie_funster_testimonial_shake .et_pb_testimonial').length;


      $('body #page-container .freddie_funster_testimonial_shake .et_pb_testimonial').each(function() {
          if (testimonialsCount <= 9) {
              $(this).prepend('<div class="testimonial_count"><span class="testimonial_icon">“</span><span class="testimonila_number">0' + testimonialsCount + '</span></div>');
          } else {
              $(this).prepend('<div class="testimonial_count"><span class="testimonial_icon">“</span><span class="testimonila_number">' + testimonialsCount + '</span></div>');
          }


          testimonialsCount--;
      });
})(jQuery);