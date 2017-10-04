jQuery(document).ready(function() {

  // Header Swiper
  var toggleMenu = function() {
    if (swiperHeader.previousIndex == 0) {
      swiperHeader.slidePrev()
    }
  }
    , menuButton = document.getElementsByClassName('menu-button')[0]
    , swiperHeader = new Swiper('.swiper-container-menu', {
    slidesPerView: 'auto'
    , initialSlide: 1
    , resistanceRatio: .00000000000001
    , onSlideChangeStart: function(slider) {
      if (slider.activeIndex == 0) {
        menuButton.classList.add('cross');
        menuButton.removeEventListener('click', toggleMenu, false);
      } else {
        menuButton.classList.remove('cross');
      }
    }
    , onSlideChangeEnd: function(slider) {
      if (slider.activeIndex == 0) {
        menuButton.removeEventListener('click', toggleMenu, false);
      } else {
        menuButton.addEventListener('click', toggleMenu, false);
      }
    }
    , slideToClickedSlide: true
  });

  // Hero Swiper
  var swiperHero = new Swiper('.swiper-container-hero', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    loop: true,
    nested: true,
    autoplay: 5000,
    effect: 'fade'
  });

  // Menu flags functionality
  $('.mre-menu-language-flag').click(function () {
    $('.mre-menu-language-flag').css('opacity', 0.4);
    $(this).css('opacity', 1);
  });

  // Add Swiper Flags
  var swiperFlag = new Swiper('.swiper-container-flags', {
    initialSlide: 1
  });

  // Adding Swiper functionality to flags
  $('.flag-image').on('click', function () {
    var index = $(this).data('pagination');
    swiperFlag.slideTo(index - 1);
    if (index == 1) {
      $('#flag-image-1').removeClass('flag-image-opacity');
      $('#flag-image-2').addClass('flag-image-opacity');
      $('#flag-image-3').addClass('flag-image-opacity');
    }
    else if(index == 2) {
      $('#flag-image-1').addClass('flag-image-opacity');
      $('#flag-image-2').removeClass('flag-image-opacity');
      $('#flag-image-3').addClass('flag-image-opacity');
    }
    else {
      $('#flag-image-1').addClass('flag-image-opacity');
      $('#flag-image-2').addClass('flag-image-opacity');
      $('#flag-image-3').removeClass('flag-image-opacity');
    }
  });

  // Swiper Blog Categories
  var swiper_blog_categories = new Swiper('.swiper-container-blog-categories', {
    slidesPerView: 5,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 0,
    centeredSlides: true,
    loop: true,
    loopSlides: 5,
    breakpoints: {
      1023: {
        spaceBetween: 19,
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0,
      },
    }
  });
  $('.blog-list-category-text').html($('.swiper-container-blog-categories').find('.swiper-slide-active').attr('name'));
  $('.swiper-slide-active').find('.swiper-overlay').removeClass('swiper-overlay');
  $('.swiper-button-next, .swiper-button-prev').click(function () {
    $('.blog-list-category-text').html($('.swiper-container-blog-categories').find('.swiper-slide-active').attr('name'));
    $('.swiper-slide').find('div').addClass('swiper-overlay');
    $('.swiper-slide-active').find('.swiper-overlay').removeClass('swiper-overlay');
  });

  // Swiper Blog Post Most Viewed
  var swiper_blog_most_viewed = new Swiper('.swiper-container-blog-most-viewed', {
    slidesPerView: 3,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 35,
    loop: true,
    breakpoints: {
      1023: {
        slidesPerView: 2,
        spaceBetween: 29,
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0,
      }
    }
  });

  // Go top button visibility
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 900)  {
      $('.mre-footer-go-top').css('display', 'block');
    } else {
      $('.mre-footer-go-top').css('display', 'none');
    }
  });

  // Footer Go to top functionality
  $(".mre-footer-go-top").click(function () {
    $("html, body").animate({scrollTop: 0}, 2000);
  });

  // Menu links scroll down
  $("#menu-about").click(function() {
    $('html, body').animate({
      scrollTop: $("#mre-about-us").offset().top
    }, 2000);
  });
  $("#menu-contact").click(function() {
    $('html, body').animate({
      scrollTop: $("#contact-us").offset().top
    }, 2000);
  });
/*
    // form validation
        var theForm = jQuery('.the-form');

        // remove invalid effects and colors on keypress
        var formField = theForm.find('input,textarea');
        formField.on('keypress', function () {
            var _this = jQuery(this);
             if ( _this.hasClass('wpcf7-not-valid') ){
                 _this.removeClass('wpcf7-not-valid');
                 _this.parent().removeClass('invalid-input');
                 _this.parent().removeClass('invalid-texarea');
             }
        });

        // show invalid effects and colors
        if ( formField.hasClass('wpcf7-not-valid') ) {
            var invalidInput    = theForm.find('input.wpcf7-not-valid').parent();
            var invalidTextarea = theForm.find('textarea.wpcf7-not-valid').parent();
            jQuery('.form-errors').show();
            invalidInput.addClass('invalid-input');
            invalidTextarea.addClass('invalid-texarea');
        }

        // override behavior after contact form submit button is clicked
        var formAnchor = theForm.find('form');
        if ( formAnchor.hasClass('failed') || formAnchor.hasClass('invalid') || formAnchor.hasClass('sent') ) {
            var scrollToForm = jQuery('#contact-us').offset().top - headerHeight;
            setTimeout(function(){ globalScroll.scrollTop(scrollToForm); }, 0);

            // form fail/success changer html changer
            var formErrors = jQuery('.form-errors');
            if ( formAnchor.hasClass('invalid') ) {
                formErrors.css({'background':'#d9534f'});
                formErrors.html('Estos campos son requeridos');
            } else if ( formAnchor.hasClass('sent') ) {
                formErrors.css({'background':'#549B03','display':'block'});
                formErrors.html('Su mensaje ha sido enviado');
            }

            var inputText  = formAnchor.find('input[type="text"]').val();
            var inputEmail = formAnchor.find('input[type="email"]').val();
            var inputTel   = formAnchor.find('input[type="tel"]').val();
            var textArea   = formAnchor.find('textarea').val();

            if ( inputText !== '' || inputEmail !== '' || inputTel !== '' || textArea !== '' ) {
                formErrors.html('Verifique los campos requeridos');
            }

        }*/
});




