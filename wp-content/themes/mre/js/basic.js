/**
 * Created by mtoledo on 3/8/17.
 */

// Open when someone clicks on the span element
function openNav() {
    document.getElementById('overlay-nav').style.left = '0%';
}

// Close when someone clicks on the "x" symbol inside the overlay
function closeNav() {
    document.getElementById('overlay-nav').style.left = '100%';
}

jQuery(document).ready(function() {
    jQuery('#about-us .item:first-child').addClass('active');

    // Footer button functionality

        // Hide or Show depending if user scrolled after about section
        jQuery(document).on('scroll', function() {
            if ( jQuery('body').scrollTop() <= jQuery('#about-us').position().top ) {
                jQuery('footer .fa-caret-up').hide();
            } else {
                jQuery('footer .fa-caret-up').show();
            }
        });

        // Scroll slow to the beggining of the page when the button is clicked
        jQuery('footer .fa-caret-up').on('click', function () {
            jQuery('body').animate({scrollTop:0}, 'slow');
        });
});