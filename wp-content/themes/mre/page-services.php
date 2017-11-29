<?php
/*
Template Name: Services
*/

get_header();
$lang = get_locale();
$serv_query   = get_posts(
	array(
		'post_type' => 'services'
	)
);
$headerPost   = get_posts(
	array(
		'post_type'   => 'header_footer',
		'numberposts' => 1
	)
);
$headerPost   = get_posts(
	array(
		'post_type'   => 'header_footer',
		'numberposts' => 1
	)
);
$hero         = get_post_meta( $serv_query[0]->ID, '_sv_hero', true );
$main_text    = get_post_meta( $serv_query[0]->ID, '_sv_main', true );
$services     = get_post_meta( $serv_query[0]->ID, '_sv_services', true );
$contact      = get_post_meta( $headerPost[0]->ID, '_hf_contact_form', true );
$partnerLeft  = get_post_meta( $headerPost[0]->ID, '_hf_partner_left', true );
$partnerRight = get_post_meta( $headerPost[0]->ID, '_hf_partner_right', true );
?>
    <section id="about-hero-section" style="background-image: url(<?php echo $hero[0]['_sv_hero_background']; ?>)">
        <div class="about-hero-overlay">
			<?php echo $hero[0]['_sv_hero_text']; ?>
        </div>
    </section>
    <section id="about-main-text">
		<?php echo $main_text[0]['_sv_main_text']; ?>
        <div class="servs">
			<?php echo $main_text[0]['_sv_services_text']; ?>
        </div>
        <div id="services-icon" class="row">
			<?php foreach ( $services as $service ) { ?>
                <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                    <div class="srv-icon"><img class="img-responsive" src="<?php echo $service['_sv_serv_image']; ?>">
                    </div>
                    <div class="srv-tlt"><?php echo $service['_sv_serv_title']; ?></div>
                </div>
			<?php } ?>
        </div>
    </section>
    <section id="our-ebooks" class="col-xs-12 text-center"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/imageservices.png)">
        <div class="mask">
            <h3><?php _e( 'Disfruta de tu tiempo', 'mre' ) ?></h3>
            <p><?php _e( 'mientras nosotros gestionamos tu propiedad', 'mre' ) ?></p>
            <a href="<?php echo ( $lang == 'es_ES' ? home_url('nuestros-servicios') : home_url('en/our-services') ) ?>" class="btn"><?php _e( 'Ve nuestros servicios', 'mre' ) ?></a>
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
                             alt="Llamanos">
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
<?php get_footer(); ?>