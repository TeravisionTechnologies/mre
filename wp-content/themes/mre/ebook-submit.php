<?php
$eb_name = filter_input(INPUT_POST, 'eb_name');
$eb_mail = filter_input(INPUT_POST, 'eb_mail');

if (!empty($eb_mail) && !get_page_by_title($eb_mail, 'OBJECT', 'suscriber')) {
	ob_start();
	?>
	<div style="color:#888">
		<h2>Hola <?php echo $eb_name; ?>, aqui esta tu ebook</h2>
		<hr>
		<p><a href="#">Descargar e-book</a></p>
	</div>
	<?php
	$contenido = ob_get_clean();
	//$contacto = get_page_by_path('contacto');
	//$addresses = get_post_meta($contacto->ID, 'email', true);
	$mail_admin = ('jrivero@teravisiontech.com');
	require_once ABSPATH . WPINC . '/class-phpmailer.php';
	$mail = new PHPMailer();

	/*$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.mandrillapp.com"; // SMTP server
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Host       = "smtp.mandrillapp.com"; // sets the SMTP server
	$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "ernesto.pinerua@bybeeconcept.com"; // SMTP account username
	$mail->Password   = "U4Gzzd7LhJGZbhPu_bG5Nw";        // SMTP account password*/

	$mail->AddAddress($mail_admin);
	$mail->From = 'noreply@mre.com.ve';
	$mail->FromName = 'Ebooks MRE';
	$asunto = 'Hola '.$eb_name.', aqui esta tu ebook';
	$mail->Subject = $asunto;
	$mail->Body = $contenido;
	$mail->IsHTML();
	$mail->CharSet = 'utf-8';
	if ($mail->Send()) {
		$args = array('posts_per_page'   => -1,
		              'post_type'        => 'suscriber',
		              'post_status'      => 'publish' );

		$num = get_posts( $args ); //cuento los post para generar el codigo
		$rand = rand(0,999999);
		$num = count($num)+500+$rand;

		if (!get_page_by_title($eb_mail, 'OBJECT', 'suscriber')) :
			$post_id = wp_insert_post(array(
				'post_type' => 'suscriber',
				'post_status' => 'publish',
				'post_author' => 1, // el ID del autor, 1 para admin
				'post_title' => $eb_mail,
				'post_name'=>md5($num),
				'post_content' => $eb_name
			));
		endif;
		?>

	<?php } else { ?>

		<div class="row">
			<div class="col-lg-12 alert text-center animated fadeInUp">
				<p style="color: #CA0000;font-weight: 600;">Hubo un error al enviar tús datos. Intente nuevamente</p>
			</div>
		</div>

		<?php
	}
}