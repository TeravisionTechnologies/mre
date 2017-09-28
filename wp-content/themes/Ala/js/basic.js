/**
 * Created by mtoledo on 3/8/17.
 */
jQuery(document).ready(function() {
  $("#go-to-top").click(function () {
    $('html,body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });

  // Add Swiper Flags
  var swiperFlag = new Swiper('.swiper-container-flags', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
  });

  // Add Swiper Projects
  var swiperProjects = new Swiper('.swiper-container-projects', {
    pagination: '.swiper-pagination',
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 52,
    initialSlide: 1,
    centeredSlides: true
  });

  // Adding Swiper functionality to flags
  $('.flag-image').on('click', function() {
    var index = $(this).data('pagination');
    swiperFlag.slideTo(index-1);
  });

  $('.swiper-container-projects').find('.swiper-slide-active h2').css('opacity', 1);
  /*$('.swiper-container-projects').find('.swiper-slide h2').on('click', function(){
    $(this).css('opacity', 1)

  });*/

});

