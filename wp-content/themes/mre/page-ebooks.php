<?php
/*
Template Name: Ebooks
*/
get_header();
$placeholder  = get_template_directory_uri() . '/assets/no-cover.jpg';
$headerPost   = get_posts(
	array(
		'post_type'   => 'header_footer',
		'numberposts' => 1
	)
);
$contact = get_post_meta( $headerPost[0]->ID, '_hf_contact_form', true );
$partnerLeft  = get_post_meta( $headerPost[0]->ID, '_hf_partner_left', true );
$partnerRight = get_post_meta( $headerPost[0]->ID, '_hf_partner_right', true );
$dates        = get_terms(
	'years',
	array(
		'orderby' => 'name',
		'order'   => 'DESC'
	)
);
?>
    <section id="about-hero-section" <?php
	if ( $thumbnail_id = get_post_thumbnail_id() ) {
		if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' ) ) {
			printf( 'style="background-image: url(%s)"', $image_src[0] );
		}
	}
	?>>
        <div class="about-hero-overlay">
            <h2><?php the_title(); ?></h2>
        </div>
    </section>

    <section id="ebook-list">
        <div class="container">
            <div class="row">
				<?php
				foreach ( $dates as $date ) {
					$ebooks = new WP_Query( array(
						'post_type' => 'ebook',
						'orderby'   => 'date',
						'order'     => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'years',
								'field'    => 'slug',
								'terms'    => array( $date->slug ),
								'operator' => 'IN'
							)
						)
					) );
					?>
                    <h2 class="heading-date col-xs-12 col-sm-12 col-md-12"><?php echo $date->name; ?></h2>
					<?php
					if ( $ebooks->have_posts() ) : while ( $ebooks->have_posts() ) : $ebooks->the_post();
						$period = get_post_meta( get_the_ID(), '_eb_ebook_period', true );
						$efile = get_post_meta( get_the_ID(), '_eb_ebook_file', true );
						?>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <a href="#" class="the-ebook" data-toggle="modal"
                               data-target="#<?php echo get_the_ID(); ?>">
                                <div class="months">
									<?php echo( ! empty( $period ) ? $period : '&nbsp;' ) ?>
                                </div>
                                <div class="cover" <?php
								if ( $thumbnail_id = get_post_thumbnail_id() ) {
									if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' ) ) {
										printf( 'style="background-image: url(%s)"', $image_src[0] );
									}
								} else {
									printf( 'style="background-image: url(' . $placeholder . ')"' );
								}
								?>>
                                    <div class="mask">
                                        <div class="ebook-title"><?php the_title(); ?></div>
                                    </div>
                                </div>
                                <div class="ebook-link"><?php _e( 'Descargar', 'mre' ) ?></div>
                            </a>
                        </div>
                        <div id="<?php echo get_the_ID(); ?>" class="modal fade modal-ebook" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i>
                                </button>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-offset-3 col-xs-6 col-xs-12 col-sm-offset-0 col-sm-5 col-md-offset-1 col-md-4 text-right">
												<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail( 'full', array( 'class' => "img-responsive anim ebook-img" ) );
												} else {
													echo '<img src="' . $placeholder . '" class="img-responsive anim ebook-img">';
												}
												?>
                                            </div>
                                            <div class="col-xs-12 col-sm-7 col-md-6 ebook-content">
                                                <div class="ebook-dates">
                                                    E-books <?php echo $date->slug ?> <?php echo( ! empty( $period ) ? '// ' . $period : '&nbsp;' ) ?></div>
                                                <h3><?php the_title(); ?></h3>
												<?php the_content(); ?>
                                                <div class="error"><i class="fa fa-asterisk"></i> <?php _e( 'Estos campos son requeridos', 'mre' ) ?></div>
                                                <form id="ebook-form-<?php echo get_the_ID(); ?>" class="ebook-form"
                                                      method="post" action="<?php echo home_url(); ?>" method="post"
                                                      role="form"
                                                      data-toggle="validator" data-disable="false" data-filepath="<?php echo $efile; ?>">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                               name="eb_name"
                                                               placeholder="<?php _e( '* Nombre y Apellido', 'mre' ) ?>"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control"
                                                               name="eb_mail"
                                                               placeholder="<?php _e( '* Email', 'mre' ) ?>" required
                                                               pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}">
                                                    </div>
                                                    <input type="hidden" name="eb_id" value="<?php echo get_the_ID(); ?>">
                                                    <button type="submit" class="btn ebook-btn"
                                                            data-number="<?php echo get_the_ID(); ?>"><?php _e( 'Descargar', 'mre' ) ?></button>
                                                </form>
                                                <div id="ebookresponse"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endwhile; endif; ?>
					<?php
					wp_reset_postdata();
				}
				?>
            </div>
        </div>
    </section>
    <section class="col-xs-12 hr-partners-section text-center">
        <div class="container">
            <p class="hr-partners-title">La nueva forma de <strong>invertir en propiedades</strong></p>
        </div>
        <div class="hr-partners-images">
            <a href="<?php echo $partnerLeft[0]['_hf_partner_link_left']; ?>" target="_blank"><img
                        src="<?php echo $partnerLeft[0]["_hf_partner_left_logo"]; ?>" alt="Logo ALA19"
                        class="partners-images-one"/></a>
            <a href="<?php echo $partnerRight[0]['_hf_partner_link_right']; ?>" target="_blank"><img
                        src="<?php echo $partnerRight[0]["_hf_partner_right_logo"]; ?>" alt="Logo MRE RealEstate"
                        class="partners-images-two"/></a>
        </div>
    </section>
    <section id="contact-us" class="col-xs-12 al-contact-div no-padding"
             style="background-image: url('<?php if ( isset( $contact[0]["_hf_contact_background"] ) ) {
		         echo $contact[0]["_hf_contact_background"];
	         } ?>')">
        <div class="overlay"></div>
        <div class="container-mre center-block">
            <div class="row">
                <p class="col-xs-12 text-center al-contact-text"><?php if ( isset( $contact[0]['_hf_contact_first'] ) ) {
						echo $contact[0]['_hf_contact_first'];
					} ?></p>
                <p class="col-xs-12 text-center al-contact-text-bold"><?php if ( isset( $contact[0]['_hf_contact_second'] ) ) {
						echo $contact[0]['_hf_contact_second'];
					} ?></p>
                <div class="col-xs-12 col-md-4 no-padding">
                    <div class="al-phone-box text-center center-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.svg"
                             alt="Llamanos Ala19">
                        <p><?php if ( isset( $contact[0]['_hf_contact_text'] ) ) {
								echo $contact[0]['_hf_contact_text'];
							} ?></p>
						<?php if ( isset( $contact[0]['_hf_contact_phone'] ) ) { ?>
                            <a href="tel:<?php echo str_replace( array(
								".",
								" ",
								"-",
								"/"
							), "", $contact[0]['_hf_contact_phone'] ); ?>"
                               class="al-phone-num"><?php echo $contact[0]['_hf_contact_phone']; ?></a>
						<?php } ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8 al-contact-form-div no-padding">
					<?php echo do_shortcode( '[contact-form-7 id="4" title="Home - Contact form"]' ); ?>
                </div>
            </div>
        </div>
    </section>
<?php
$url = wp_upload_dir();
var_dump($url['basedir']); ?>
<?php get_footer(); ?>