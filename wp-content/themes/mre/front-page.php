<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 05/09/17
 * Time: 09:10 AM
 */
get_header();

$headerPost = get_posts(
  array(
    'post_type' => 'header_footer',
    'numberposts' => 1
  )
);
$theMeta = get_post_meta($headerPost[0]->ID);
?>

<section id="hero-container" class="row">
  <a href="<?php echo $theMeta['_hf_left_hero_link'][0] ?>">
    <div class="col-xs-12 col-md-6 hero-box hero-box-left" style="background-image: url('<?php echo ($theMeta['_hf_hero_image_left'][0]) ?>');">
      <div class="overlay-left">
        <h3 class="center-block"><?php echo $theMeta['_hf_text_hero_left'][0] ?></h3>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-icon-left.svg">
      </div>
    </div>
  </a>
  <a href="<?php echo $theMeta['_hf_right_hero_link'][0] ?>">
    <div class="col-xs-12 col-md-6 hero-box hero-box-right" style="background-image: url('<?php echo ($theMeta['_hf_hero_image_right'][0]) ?>');">
      <div class="overlay-right">
        <h3 class="center-block"><?php echo $theMeta['_hf_text_hero_right'][0] ?></h3>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-icon-right.svg">
      </div>
    </div>
  </a>
  <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-arrow.svg" class="hero-button">
</section>

<section id="about-us">
    <div class="title">
        <h4>Sobre Nosotros</h4>
        <h1>Bienvenido a
            <span>Grupo Merand Real State</span>
        </h1>
    </div>
    <div id="about-sections" class="swiper-container">

        <!-- Wrapper for slides -->
        <div class="swiper-wrapper">

	        <?php
                $aboutPost = get_posts(
                    array(
                        'post_type' => 'about_us'
                    )
                );

                $entries = get_post_meta( $aboutPost[0]->ID, 'about_group_field', true );

                foreach ( (array) $entries as $key => $entry ) {

	                ?><div class="swiper-slide"><?php

	                    ?><div class="item-image"><?php
                        if ( isset( $entry['_about_image'] ) ) {
                            ?><img src="<?php echo $entry['_about_image']; ?>" /><?php
                        }
		                ?></div><?php

                        ?><div class="item-paragraph"><?php
                        if ( isset( $entry['_about_desc'] ) ) {
	                        echo wpautop( $entry['_about_desc'] );
                        }
                        ?></div><?php

                    ?></div><?php
                }
	        ?>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Left and Right Buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="extra-info">
        <h2>+500
            <span>Inversionistas</span>
        </h2>
        <h2>+800
            <span>Rentas por Mes</span>
        </h2>
        <h2>+160.000
            <span>Ventas al Año</span>
        </h2>
    </div>
</section>

<section id="after-about-us">
    <h4>Nuestros Socios</h4>
    <h1>Hacemos real tu Inversión soñada</h1>
    <div id="partners-images">
	    <?php
	        $aboutMeta = get_post_meta($aboutPost[0]->ID);

	        if ( isset( $aboutMeta['_about_image-1'][0] ) ) {
        ?><img id="hr-realty" src="<?php echo $aboutMeta['_about_image-1'][0] ?>" />
        <?php }
	        if ( isset( $aboutMeta['_about_image-1'][0] ) ) {
        ?><img id="ala-19" src="<?php echo $aboutMeta['_about_image-2'][0] ?>" />
        <?php } ?>
    </div>
</section>

<section id="before-contact-us">
    <div id="offices" class="swiper-container">
        <div class="flags-indicators">
            <img data-pagination="1" src="<?php echo get_template_directory_uri(); ?>/assets/ven_flag.svg" />
            <img data-pagination="2" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
            <img data-pagination="3" src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
        </div>
        <h4>Puedes encontrar Nuestras Oficinas en:</h4>
        <!-- Wrapper for slides -->
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="office-detail">
                    <h5>
                        <span>Caracas:</span>
                    </h5>
                    <h5>Centro Empresarial Parque Humboldt</h5>
                    <h5>Piso 19, Oficinas 19-05 / 19-06</h5>
                    <h5>Teléfonos: +58 212 975 39 40 / 212 975 41 651</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="office-detail usa-office">
                    <h5>
                        <span>Orlando:</span>
                    </h5>
                    <h5>2295 S. Hiawassee Road, Suite 407E</h5>
                    <h5>Orlando, Florida</h5>
                    <h5>Teléfonos: +1 407 255.08.71</h5>
                </div>
                <div class="office-detail usa-office">
                    <h5>
                        <span>Miami:</span>
                    </h5>
                    <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
                    <h5>Miami, Florida</h5>
                    <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="office-detail">
                    <h5>
                        <span>Madrid:</span>
                    </h5>
                    <h5>Calle Ortega y Gasset #6</h5>
                    <h5>Primero Izquierda</h5>
                    <h5>Sample: +34 605 816 803</h5>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<section id="contact-us">
    <div class="spacer initial"></div>
    <h1 class="title">Nos gustaría asesorarte
        <span class="first">en tu próxima inversión</span>
        <span class="last">¡Contáctanos!</span>
    </h1>
    <div class="spacer"></div>
    <div class="inner-section">
        <div class="form-errors">Uno o más campos tiene un error</div>
        <div class="call-us">
            <div class="content">
                <div class="spacer-before-image"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/d-iconphone.svg" />
                <h2 id="advice-call">Llámenos para asesoría <span class="bold-me">Inmediata</span></h2>
                <h2 id="contact-phone" class="bold-me">+1 786 376.22.22</h2>
                <div class="spacer-end"></div>
            </div>
        </div>
        <div class="the-form">
            <?php echo do_shortcode( '[contact-form-7 id="11" title="Home - Contact form"]' ); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
	</body>
</html>