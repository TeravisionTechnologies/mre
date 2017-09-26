/**
 * Created by mtoledo on 3/8/17.
 */

// Open when user clicks on the burger menu
function openNav() {
    document.getElementById('overlay-nav').style.left = '0%';
}

// Close when user clicks on the "x" symbol inside the overlay
function closeNav() {
    document.getElementById('overlay-nav').style.left = '100%';
}

function showOrHideFooterButton (fb) {
    if ( jQuery(document).scrollTop() <= jQuery('#about-us').offset().top ) {
        fb.hide();
    } else {
        fb.show();
    }
}

// Footer button functions
function footerOnloadAndScroll (fb) {
    if ( jQuery(window).width() > 1023 ) {
        showOrHideFooterButton(fb);
        // Hide or Show depending if user scrolled after about section
        jQuery(document).on('scroll', function() {
            showOrHideFooterButton(fb);
        });
    } else {
        // Hide if user is in mobile
        fb.css({'display':'none'});
    }
}

jQuery(document).ready(function() {

    // Declaring the global scroll of the html to use in further functions
    var globalScroll = jQuery('body,html');

    // Swiper

        // Add Swiper
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true
        });

        // Adding Swiper functionality to flags
        jQuery('.flags-indicators img').on('click touchstart', function () {
            var iter = jQuery(this).data('pagination');
            var iterBull=1;
            jQuery('#offices .swiper-pagination-bullet').each(function () {
                if ( iter === iterBull ) {
                    jQuery(this).trigger('click');
                }
                iterBull+=1;
            });
        });

        //Swiper Blog Categories
        var swiper_blog_categories = new Swiper('.swiper-container-blog-categories', {
                slidesPerView: 5,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 32,
                centeredSlides: true,
                loop: true,
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

    // Menu scroll effects

        // I am going to use this in other js section down the code
        var headerMargin = jQuery('.center-header').css('margin-top');
        headerMargin     = headerMargin.replace(headerMargin.slice(-2),'');
        var headerHeight = jQuery('header').innerHeight() - headerMargin  - 3;

        var menuItem = jQuery('.menu-item');
        menuItem.on('click', function (e) {
            e.preventDefault();
            // close overlay in mobile when something is clicked
            jQuery('#overlay-nav').css({'left':'100%'});

            // slow scroll effect
            var _this = jQuery(this).find('a').attr('href');
            if ( _this !== '#') {
                var scrollTo = jQuery(_this).offset().top - headerHeight;
                globalScroll.stop().animate({scrollTop:scrollTo}, 'slow');
            }
        });


    // footer functions

        // Scroll slow to the beginning of the page when the button is clicked
        var footerButton = jQuery('footer .caretCircle');
        footerButton.on('click', function () {
            globalScroll.stop().animate({scrollTop:0}, 'slow');
        });

        // Function used to hide or show the footer button
        footerOnloadAndScroll(footerButton);


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

});

// Call footer functionality on resize so only shows up in 1024px and ahead
jQuery(window).resize(function() {
    footerOnloadAndScroll(jQuery('footer .caretCircle'));
});
