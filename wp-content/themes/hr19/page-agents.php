<?php
/*
Template Name: Agents
*/
get_header();
//$phone = get_post_meta( get_the_ID(), '_ag_phone', true);
//$email = get_post_meta( get_the_ID(), '_ag_mail', true);
?>

    <section class="agent-hero" style="<?php if ($thumbnail_id = get_post_thumbnail_id()) {
        if ($image_src = wp_get_attachment_image_src($thumbnail_id, 'full')) printf('background: rgba(0, 0, 0, 0.4) url(%s)"', $image_src[0]);
    } ?>">
        <h1><?php the_title(); ?></h1>
        <div class="mask"></div>
    </section>


<?php get_footer();
