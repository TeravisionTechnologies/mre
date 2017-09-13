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
            jQuery('body').animate({scrollTop:0}, 'slow');
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

    // Add active class to the first carousel item of #about-us
    jQuery('#about-us .item:first-child').addClass('active');

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
});

// Call footer functionality on resize so only shows up in 1024px and ahead
jQuery(window).resize(function() {
    console.log('resized');
    console.log(jQuery(window).width());
    footer_functions();
});