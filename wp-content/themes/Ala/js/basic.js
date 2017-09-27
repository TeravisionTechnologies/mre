/**
 * Created by mtoledo on 3/8/17.
 */
jQuery(document).ready(function() {
  $("#go-to-top").click(function () {
    $('html,body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });

  // Swiper

  // Add Swiper
  var swiperFlag = new Swiper('.swiper-container-flags', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
  });

  // Adding Swiper functionality to flags
  $('.flag-image').on('click', function() {
    var index = $(this).data('pagination');
    swiperFlag.slideTo(index-1);
    //alert(index);
    /*var iterBull=1;*/

  });
});

