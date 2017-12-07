<?php
$referer = wp_get_referer();

if ( (strpos($referer, "en")  == false) && strpos($_SERVER['REQUEST_URI'], "en") == false ){
	$langu = "es";
	$menuid = 2;
} else{
	$langu = "en";
	$menuid = 20;
}
$footer_query    = get_posts(
	array(
		'post_type' => 'header_footer',
		'lang' => $langu
	)
);
$partners        = get_post_meta( $footer_query[0]->ID, '_hf_partners', true );
$rental          = get_post_meta( $footer_query[0]->ID, '_hf_rental', true );
$contact         = get_post_meta( $footer_query[0]->ID, '_hf_contact_form', true );
$footer_info     = get_post_meta( $footer_query[0]->ID );
$social_networks = get_post_meta( $footer_query[0]->ID, '_hf_social_networks', true );
$lang = get_locale();
$url_wp = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<?php if ( ! is_404() ) { ?>
<section class="col-xs-12 hr-partners-section text-center">
    <div class="container">
        <p class="hr-partners-title"><?php if ( isset( $partners[0]['_hf_partners_text'] ) ) {
				echo $partners[0]['_hf_partners_text'];
			} ?></p>
    </div>
    <div class="hr-partners-images">
        <a href="<?php echo $partners[0]['_hf_partner_link_left']; ?>" target="_blank"><img
                    src="<?php echo $partners[0]['_hf_partner_logo_left']; ?>" alt="Logo ALA19"
                    class="partners-images-one"/></a>
        <a href="<?php echo $partners[0]['_hf_partner_link_right']; ?>" target="_blank"><img
                    src="<?php echo $partners[0]['_hf_partner_logo_right']; ?>" alt="Logo MRE RealEstate"
                    class="partners-images-two"/></a>
    </div>
</section>
<?php } ?>
<?php wp_reset_query(); ?>
<?php if ( is_front_page() or is_page_template( 'page-alquileres.php' ) or is_page_template( 'page-preventa.php' ) ) { ?>
    <section id="rentalone" class="col-xs-12 hr-rentalone-section text-center no-padding"
             style="background-image: url('<?php echo $rental[0]["_hf_rental_background"] ?>')">
        <div class="hr-rentalone-overlay">
            <img src="<?php echo $rental[0]["_hf_rental_logo"] ?>" alt="Logo Rental One" class="rentalone-logo"/>
            <?php
            if (false !== strpos($url_wp, '/en' )) {
                echo '<div class="rentalone-button"><a href="'.$rental[0]["_hf_rental_link"].'" target="_blank">View
                    more</a></div>';
            } else {
                echo '<div class="rentalone-button"><a href="'.$rental[0]["_hf_rental_link"].'" target="_blank">Ver
                    más</a></div>';
            }
            ?>
        </div>
    </section>
<?php } ?>
<?php if ( ! is_404() ) { ?>
  <section id="mre-offices" class="col-xs-12" style="background-image: url('http://test-mre.pantheonsite.io/wp-content/uploads/2017/10/offices.jpg');">
    <div class="swiper-container swiper-container-flags swiper-container-horizontal">
      <h4>Puedes <strong>encontrarnos</strong> en</h4>                  <div class="flags-indicators">
        <div id="flag-image-1" class="flag-image flag-image-opacity" data-pagination="1" style="background-image: url(http://test-mre.pantheonsite.io/wp-content/uploads/2017/11/usa_flag.svg)"></div><div id="flag-image-2" class="flag-image" data-pagination="2" style="background-image: url(http://test-mre.pantheonsite.io/wp-content/uploads/2017/10/spain_flag.svg)"></div><div id="flag-image-3" class="flag-image" data-pagination="3" style="background-image: url(http://test-mre.pantheonsite.io/wp-content/uploads/2017/11/ven_flag.svg)"></div>                  </div>
      <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
        <div class="swiper-slide swiper-slide-active" style="width: 1280px;">
          <div class="office-detail">
            <h5><span>Miami · Sede principal</span></h5>
            <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
            <h5>USA</h5>
            <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
          </div>
          <div class="office-detail">
            <h5><span>Orlando</span></h5>
            <h5>2295 S. Hiawassee Road, Suite 407E</h5>
            <h5>USA</h5>
            <h5>Teléfonos: +1 407 255.08.71</h5>
          </div>
        </div>
        <div class="swiper-slide swiper-slide-next" style="width: 1280px;">
          <div class="office-detail">
            <h5><span>Madrid</span></h5>
            <h5>C/ Velázquez 78, 2º Dcha. 28001</h5>
            <h5>España</h5>
            <h5>Teléfonos: +34 605 816 803</h5>
          </div>
        </div>
        <div class="swiper-slide" style="width: 1280px;">
          <div class="office-detail">
            <h5><span>Caracas</span></h5>
            <h5>Avenida Río Caura, Centro Empresarial Parque Humboldt, Piso 19, Oficinas 19-05 / 19-06</h5>
            <h5>Venezuela</h5>
            <h5>Teléfonos: +58 212 975 39 40 / 212 975 41 651</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
<section id="contact-us" class="col-xs-12 hr-contact-div no-padding"
         style="background-image: url('<?php if ( isset( $contact[0]["_hf_contact_background"] ) ) {
	         echo $contact[0]["_hf_contact_background"];
         } ?>')">
    <div class="container-hr center-block">
        <div class="row">
            <p class="col-xs-12 text-center hr-contact-text"><?php if ( isset( $contact[0]['_hf_contact_first'] ) ) {
					echo $contact[0]['_hf_contact_first'];
				} ?></p>
            <p class="col-xs-12 text-center hr-contact-text-bold"><?php if ( isset( $contact[0]['_hf_contact_second'] ) ) {
					echo $contact[0]['_hf_contact_second'];
				} ?></p>
            <div class="col-xs-12 col-md-4 no-padding">
                <div class="hr-phone-box text-center center-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.svg" alt="Llamanos HR19">
                    <p><?php if ( isset( $contact[0]['_hf_contact_text'] ) ) {
							echo $contact[0]['_hf_contact_text'];
						} ?></p>
                    <a href="tel:<?php echo str_replace( array(
						".",
						" ",
						"-",
						"/"
					), "", $contact[0]['_hf_contact_phone'] ); ?>"
                       class="hr-phone-num"><?php echo $contact[0]['_hf_contact_phone']; ?></a>
                </div>
            </div>
            <div class="col-xs-12 col-md-8 hr-contact-form-div no-padding">
                <?php
                    $contactesp = do_shortcode( '[contact-form-7 id="5" title="Home Contact Form"]');
                    $contacteng = do_shortcode( '[contact-form-7 id="443" title="Contact Form (English)"]');
                    echo ( ($lang == "es_ES" and $langu == "es") ? $contactesp : $contacteng );
                ?>
            </div>
        </div>
    </div>
</section>
<footer class="col-xs-12 hr-footer-section text-center">
    <div class="container">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo $footer_info['_hf_logo'][0]; ?>"
                                                 alt="Logo HR19 Footer"></a>
        <p class="hr-footer-text"><?php echo $footer_info['_hf_copy'][0]; ?></p>
        <a href="#" class="hr-footer-link">Disclaimers</a>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/top.svg" class="footer-top" alt="Go to top">
</footer>
<?php } ?>
</div>
</div>
<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <div id="c-button--slide-left" class="menu-button c-button pull-right c-menu__close c-button-close">
        <div id="nav-icon4" class="open">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="menu">
        <div class="menu-wrapper">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu' => $menuid,
				'container'      => false,
				'menu_class'     => "hr-menu c-menu__items",
			) ); ?>
            <div class="hr-menu-language">
				<?php
				$i         = 0;
				$languages = pll_the_languages( array( 'raw' => 1 ) );
				?>
                <h2 class="hr-menu-language-text"><?php echo ( ( $lang == "es_ES" && $langu == "es" ) ? 'Seleccione su idioma de preferencia:' : 'Select your preferred language:' ) ?></h2>
                <a href="<?php echo $languages['es']['url'] ?>"><img class="hr-menu-language-flag <?php echo ( $lang == "es_ES" ? 'language-flag-active' : '' ) ?>"
                                                                      src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg"
                                                                      alt="Spanish"></a>
                <a href="<?php echo $languages['en']['url'] ?>"><img class="hr-menu-language-flag <?php echo ( $lang == "en_US" ? 'language-flag-active' : '' ) ?>"
                                                                      src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg"
                                                                      alt="English"></a>
            </div>
            <div class="hr-menu-social">
				<?php if ( isset( $social_networks[0] ) ) { ?>
                    <ul class="menu-social-icons">
						<?php if ( isset( $social_networks[0]['_hf_linkedin'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>"
                                                            target="_blank"><i class="fa fa-linkedin"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_facebook'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>"
                                                            target="_blank"><i class="fa fa-facebook"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_instagram'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>"
                                                            target="_blank"><i class="fa fa-instagram"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_twitter'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>"
                                                            target="_blank"><i class="fa fa-twitter"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_youtube'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>"
                                                            target="_blank"><i class="fa fa-youtube-play"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
                    </ul>
				<?php } ?>
            </div>
        </div>
    </div>
</nav>
<div id="c-mask" class="c-mask"></div>
<?php wp_footer(); ?>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
</script>
</body>
</html>