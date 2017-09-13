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

jQuery(document).ready(function() {

    // Add active class to the first carousel item of #about-us
    jQuery('#about-us .item:first-child').addClass('active');

    // close overlay in mobile when something is clicked
    jQuery('.menu-item').on('click', function () {
        jQuery('#overlay-nav').css({'left':'100%'});
    });

    // Footer button functionality

        var footerButton = jQuery('footer .fa-caret-up');
        // Hide or Show depending if user scrolled after about section
        jQuery(document).on('scroll', function() {
            if ( jQuery('body').scrollTop() <= jQuery('#about-us').position().top ) {
                footerButton.hide();
            } else {
                footerButton.show();
            }
        });

        // Scroll slow to the beggining of the page when the button is clicked
        footerButton.on('click', function () {
            jQuery('body').animate({scrollTop:0}, 'slow');
        });
});