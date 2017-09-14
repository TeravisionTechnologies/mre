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
    if (jQuery(document).scrollTop() <= jQuery('#about-us').position().top) {
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
            jQuery('#offices .swiper-pagination .swiper-pagination-bullet').each(function () {
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
               var scrollTo = jQuery(_this).position().top - jQuery(window).width() / 20 ;
               jQuery('body').animate({scrollTop:scrollTo}, 'slow');
           }
       });

    // footer functions

       // Scroll slow to the beginning of the page when the button is clicked
       var footerButton = jQuery('footer .caretCircle');
       footerButton.on('click', function () {
           jQuery('body').animate({scrollTop:0}, 'slow');
       });

       // Function used to hide or show the footer button
       footerOnloadAndScroll(footerButton);

    // form validation

       // remove invalid effects and colors on keypress
       jQuery('.the-form input').on('keypress', function () {
           var _this = jQuery(this);
            if ( _this.hasClass('wpcf7-not-valid') ){
                _this.removeClass('wpcf7-not-valid');
                _this.parent().removeClass('invalid-input');
            }
       });

       // show invalid effects and colors
       if ( jQuery('.the-form input').hasClass('wpcf7-not-valid') ) {
           var invalidInput = jQuery('.the-form').find('input.wpcf7-not-valid').parent();
           jQuery('.form-errors').show();
           invalidInput.addClass('invalid-input');
       }
});

// Call footer functionality on resize so only shows up in 1024px and ahead
jQuery(window).resize(function() {
    footerOnloadAndScroll(jQuery('footer .caretCircle'));
});
