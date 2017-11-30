<?php
ob_start();
$eb_name = filter_input( INPUT_POST, 'eb_name' );
$eb_mail = filter_input( INPUT_POST, 'eb_mail' );
$eb_id   = filter_input( INPUT_POST, 'eb_id' );
//$eb_file = get_post_meta( $eb_id, '_eb_ebook_file', true );
$eb_file = "C:/xampp/htdocs/mre/wp-content/uploads/2017/11/Ebook-de-ejemplo.pdf";

if ( ! empty( $eb_mail ) && ! get_page_by_title( $eb_mail, 'OBJECT', 'suscriber' ) ) {

	$args = array(
		'posts_per_page' => - 1,
		'post_type'      => 'suscriber',
		'post_status'    => 'publish'
	);

	$num  = get_posts( $args );
	$rand = rand( 0, 999999 );
	$num  = count( $num ) + 500 + $rand;

	if ( ! get_page_by_title( $eb_mail, 'OBJECT', 'suscriber' ) ) :
		$post_id = wp_insert_post( array(
			'post_type'    => 'suscriber',
			'post_status'  => 'publish',
			'post_author'  => 1,
			'post_title'   => $eb_mail,
			'post_name'    => md5( $num ),
			'post_content' => $eb_name
		) );
	endif;

}

if ( ! empty( $eb_file ) ) {

	header( 'Content-Description: File Transfer' );
	header( 'Content-type: application/pdf' );
	header( 'Content-Disposition: attachment; filename="' . basename( $eb_file ) . '"' );
	header( 'Content-Transfer-Encoding: binary' );
	header( 'Expires: 0' );
	header( 'Cache-Control: must-revalidate' );
	header( 'Pragma: public' );
	header( 'Content-Length: ' . filesize( $eb_file ) );
	ob_clean();
	flush();
	readfile( $eb_file );
	exit();

}