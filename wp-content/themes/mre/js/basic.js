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

// Footer button functions
function footer_functions () {
    var footerButton = jQuery('footer .fa-caret-up');
    if ( jQuery(window).width() > 1023 ) {

        // Scroll slow to the beginning of the page when the button is clicked
        footerButton.on('click', function () {
            jQuery('body').animate({scrollTop:10}, 'slow');
        });

        // Hide or Show depending if user scrolled after about section
        jQuery(document).on('scroll', function() {
            if ( jQuery(window).width() > 1023 ) {
                if (jQuery(document).scrollTop() <= jQuery('#about-us').position().top) {
                    footerButton.hide();
                } else {
                    footerButton.show();
                }
            }
        });
    } else {
        footerButton.css({'display':'none'});
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
        // close overlay in mobile when something is clicked
        menuItem.on('click', function () {
            jQuery('#overlay-nav').css({'left':'100%'});
        });

       menuItem.on('click', function () {
           var _this    = jQuery(this).find('a').attr('href');
           if ( _this !== '#') {
               var scrollTo = jQuery(_this).position().top;
               jQuery('body').animate({scrollTop:scrollTo}, 'slow');
           }
        });

    footer_functions();

    jQuery('.the-form input').on('keypress', function () {
        var _this = jQuery(this);
        if ( _this.hasClass('wpcf7-not-valid') ){
            _this.removeClass('wpcf7-not-valid');
            _this.parent().removeClass('invalid-input');
        }
    });

    if ( jQuery('.the-form').find('input').hasClass('wpcf7-not-valid') ) {
        var invalidInput = jQuery('.the-form').find('input.wpcf7-not-valid').parent();
        jQuery('.form-errors').show();
        invalidInput.addClass('invalid-input');
    }
});

// Call footer functionality on resize so only shows up in 1024px and ahead
jQuery(window).resize(function() {
    footer_functions();
});
