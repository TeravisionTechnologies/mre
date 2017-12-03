<?php
get_header();
$lang = get_locale();
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
        <p><?php echo ( $lang == "es_ES" ? '¡Lo siento!' : 'We are sorry!' ) ?></p>
        <p><?php echo ( $lang == "es_ES" ? 'esta página no está disponible' : 'this page is not available' ) ?></p>
        <a href="<?php echo home_url() ?>" class="btn"><?php echo ( $lang == "es_ES" ? 'Regresar al inicio' : 'Go to home' ) ?></a>
    </div>
</section>

<?php get_footer(); ?>