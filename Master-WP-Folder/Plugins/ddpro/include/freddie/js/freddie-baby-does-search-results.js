 (function($) {
     setInterval(function() {
             $('.freddie_baby_does_search_results_main article').each(function() {

                 $(this).find('h2.entry-title a').succinct({
                     size: 38
                 });
             });
     }, 200);


     $(".freddie_baby_does_search_results_main article").on("click", function(e) {
         e.preventDefault();
         $(this).first('a')[0].click();
     });

 })(jQuery);