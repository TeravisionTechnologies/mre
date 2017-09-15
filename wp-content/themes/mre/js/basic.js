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

    // Menu scroll effects

       var menuItem = jQuery('.menu-item');
       menuItem.on('click', function (e) {
           e.preventDefault();
           // close overlay in mobile when something is clicked
           jQuery('#overlay-nav').css({'left':'100%'});

           // slow scroll effect

           var _this    = jQuery(this).find('a').attr('href');
           if ( _this !== '#') {
               var headerMargin = jQuery('.center-header').css('margin-top');
               headerMargin     = headerMargin.replace(headerMargin.slice(-2),'');
               var headerHeight = jQuery('header').innerHeight() - headerMargin  - 3;
               var scrollTo     = jQuery(_this).offset().top - headerHeight;
               jQuery('body,html').stop().animate({scrollTop:scrollTo}, 'slow');
           }
       });

    // footer functions

       // Scroll slow to the beginning of the page when the button is clicked
       var footerButton = jQuery('footer .caretCircle');
       footerButton.on('click', function () {
           jQuery('body,html').stop().animate({scrollTop:0}, 'slow');
       });

       // Function used to hide or show the footer button
       footerOnloadAndScroll(footerButton);

    // form validation

       // remove invalid effects and colors on keypress
       var formField = jQuery('.the-form').find('input,textarea');
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
           var invalidInput    = jQuery('.the-form').find('input.wpcf7-not-valid').parent();
           var invalidTextarea = jQuery('.the-form').find('textarea.wpcf7-not-valid').parent();
           jQuery('.form-errors').show();
           invalidInput.addClass('invalid-input');
           invalidTextarea.addClass('invalid-texarea');
       }
});

// Call footer functionality on resize so only shows up in 1024px and ahead
jQuery(window).resize(function() {
    footerOnloadAndScroll(jQuery('footer .caretCircle'));
});
