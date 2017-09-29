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
  /*var swiperProjects = new Swiper('.swiper-container-projects', {
    pagination: '.swiper-pagination',
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 52,
    initialSlide: 1,
    centeredSlides: true,
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 26
      },
      375: {
        slidesPerView: 3,
        spaceBetween: 13
      }
    }
  });*/

  // Adding Swiper functionality to flags
  $('.flag-image').on('click', function() {
    var index = $(this).data('pagination');
    swiperFlag.slideTo(index-1);
  });

  // Projects change effect
  $('.item-active').next().css('opacity', 1);
  $('.al-project-list-item').click(function () {
    $('.al-project-list-item').find('h2').removeClass('item-active');
    $(this).find('h2').addClass('item-active');
    $('.triangle').css('opacity', 0);
    $(this).find('img').css('opacity', 1);
  });

});

