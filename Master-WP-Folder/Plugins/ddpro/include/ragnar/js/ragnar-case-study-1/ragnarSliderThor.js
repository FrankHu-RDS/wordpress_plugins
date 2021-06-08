(function ($){

/* Thor Slider - Ragnar */
$(document).ready(function(){
   setTimeout(function(){
      
         //Remove WP 5.5 Lazy Loading
         $('.ragnar_slider_thor img').attr('loading', '');
         
         var nextImg = $('.ragnar_slider_thor .et-pb-active-slide').next().find('img').attr('src');
         var totalSlides = $('.ragnar_slider_thor .et_pb_slide').size();
         var currSlide = $('.ragnar_slider_thor .et-pb-active-slide').index() + 1;

         if(totalSlides < 10){
             totalSlides = '0' + totalSlides;
             currSlide = '0' + currSlide
         }
         

         $('<div class="thor-slider-next-slide" style="background-image: url('+ nextImg +')"></div>').insertAfter('.ragnar_slider_thor .et_pb_slides');
         $('<div id="thor-slider-count"><div id="thor-slider-count-active">'+ currSlide +'</div>/<div id="thor-slider-count-total">'+ totalSlides +'</div></div>').insertAfter('.ragnar_slider_thor .et_pb_slides');

         //Prev slide click
         $('.ragnar_slider_thor .et-pb-arrow-prev').click(function(){
            setTimeout(function(){
                  
                  var currSlide = $('.ragnar_slider_thor .et-pb-active-slide').index();

                if(currSlide < 10){
                    $('#thor-slider-count-active').html('0' + (currSlide+1));
                }else{
                    $('#thor-slider-count-active').html(currSlide+1);
                }


                  var prevSlide = jQuery('.ragnar_slider_thor .et-pb-active-slide').prev().find('img').attr('src');
                  var lastSlide = jQuery('.ragnar_slider_thor .et_pb_slide:last-child').find('img').attr('src');
                  var totalSlides = $('.ragnar_slider_thor .et_pb_slide').size();


                  if ( currSlide == 0 ) {
                     $('.thor-slider-next-slide').css('background-image', 'url('+ lastSlide +')');
                  }else{
                      $('.thor-slider-next-slide').css('background-image', 'url('+ prevSlide +')');
                  }
            }, 400);    
         });
         
         //Next slide click
         $('.ragnar_slider_thor .et-pb-arrow-next').click(function(){
            setTimeout(function(){
                  
                  var totalSlides = $('.ragnar_slider_thor .et_pb_slide').size();
                  var currSlide = $('.ragnar_slider_thor .et-pb-active-slide').index();
                  var firstSlide = $('.ragnar_slider_thor .et_pb_slide :first').find('img').attr('src');
                  var nextSlide = jQuery('.ragnar_slider_thor .et-pb-active-slide').next().find('img').attr('src');

                if(currSlide < 10){
                    $('#thor-slider-count-active').html('0' + (currSlide+1));
                }else{
                    $('#thor-slider-count-active').html(currSlide+1);
                }

                  
                  if ( currSlide+1 == totalSlides ) {
                      $('.thor-slider-next-slide').css('background-image', 'url('+ firstSlide +')');
                  }
                  else {
                      $('.thor-slider-next-slide').css('background-image', 'url('+ nextSlide +')');
                  }
            }, 400);    
         });
         
    }, 500);        
   
   });
})(jQuery);