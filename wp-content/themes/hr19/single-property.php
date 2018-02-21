<?php

get_header();
the_post();
$lang        = get_locale();
$transaction = get_post_meta( get_the_ID(), '_pr_transaction', true );

if ( $transaction == "Presale" ) {
	get_template_part( 'partials/presale' );
} else {
	get_template_part( 'partials/default' );
}

get_footer();

?>