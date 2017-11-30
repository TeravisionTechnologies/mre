<?php
get_header();
$headerPost = get_posts(
	array(
		'post_type' => 'header_footer',
		'numberposts' => 1
	)
);
$bg = get_post_meta( $headerPost[0]->ID, '_hf_nfbg', true );
?>

<section id="not-found" class="not-found text-center" style="background-image: url('<?php if(isset($bg)) { echo $bg; }?>')">
    <div class="mask-not-found"></div>
    <div class="error">
        <h5>4<i class="fa fa-gear rotateIn"></i>4</h5>
        <p><?php _e( '¡Lo siento!', 'mre' ) ?></p>
        <p><?php _e( 'esta página no está disponible', 'mre' ) ?></p>
        <a href="<?php echo home_url() ?>" class="btn"><?php _e( 'Regresar al inicio', 'mre' ) ?></a>
    </div>
</section>

<?php get_footer(); ?>