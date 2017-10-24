<?php
    get_header();
    the_post();
    $phone = get_post_meta( get_the_ID(), '_ag_phone', true);
    $email = get_post_meta( get_the_ID(), '_ag_mail', true);
?>





















<?php get_footer();
