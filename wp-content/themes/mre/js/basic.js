jQuery(document).ready(function() {

  //Header Swiper
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

  //Hero Swiper
  var swiperHero = new Swiper('.swiper-container-hero', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    paginationClickable: true,
    loop: true,
    nested: true
  });


    // Declaring the global scroll of the html to use in further functions
    //var globalScroll = jQuery('body,html');




        // Adding Swiper functionality to flags
        /*jQuery('.flags-indicators img').on('click touchstart', function () {
            var iter = jQuery(this).data('pagination');
            var iterBull=1;
            jQuery('#offices .swiper-pagination-bullet').each(function () {
                if ( iter === iterBull ) {
                    jQuery(this).trigger('click');
                }
                iterBull+=1;
            });
        });*/

        //Swiper Blog Categories
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

        //Swiper Blog Post Most Viewed
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



    // footer functions

      /*$(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 900)  {
          $('.mre-footer-go-top').css('display', 'block');
        } else {
          $('.mre-footer-go-top').css('display', 'none');
        }
      });


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

        }

    //Footer Go to top functionality
    $(".mre-footer-go-top").click(function () {
      $("html, body").animate({scrollTop: 0}, 2000);
    });*/
});




