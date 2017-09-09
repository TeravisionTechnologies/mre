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

// jQuery Based Methods
jQuery(document).ready(function() {

    jQuery('.flag').on('click', function () {
        let thisFlag = jQuery(this);
        jQuery('.flag').each(function(){
            jQuery(this).removeClass('active');
        });
        thisFlag.addClass('active');
    });

    jQuery('#about-sections .carousel-inner .item:first-child').addClass('active');

});