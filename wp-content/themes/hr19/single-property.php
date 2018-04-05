<?php

get_header();
the_post();
$transaction      = get_post_meta( get_the_ID(), '_pr_transaction', true );
$presale_template = get_post_meta( get_the_ID(), '_pr_use_template', true );
$video            = get_post_meta( get_the_ID(), '_pr_video_embed', true );

if ( $transaction == "Presale" || $presale_template == "on" ) {
	get_template_part( 'partials/presale' );
} else {
	get_template_part( 'partials/default' );
}

get_footer();

?>