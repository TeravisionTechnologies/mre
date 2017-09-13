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
  <div class="col-xs-12 col-md-6 hero-box hero-box-left" style="background-image: url('<?php echo ($theMeta['_hf_hero_image_left'][0]) ?>');">
      <div class="overlay-left">
          <h3 class="center-block"><?php echo $theMeta['_hf_text_hero_left'][0] ?></h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-icon-left.svg">
      </div>
  </div>
  <div class="col-xs-12 col-md-6 hero-box hero-box-right" style="background-image: url('<?php echo ($theMeta['_hf_hero_image_right'][0]) ?>');">
      <div class="overlay-right">
          <h3 class="center-block"><?php echo $theMeta['_hf_text_hero_right'][0] ?></h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-icon-right.svg">
      </div>
  </div>
  <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-arrow.svg" class="hero-button">
</section>

<section id="about-us">
    <div class="title">
        <h4>Sobre Nosotros</h4>
        <h1>Bienvenido a
            <span>Grupo Merand Real State</span>
        </h1>
    </div>
    <div id="about-sections" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#about-sections" data-slide-to="0" class="active"></li>
            <li data-target="#about-sections" data-slide-to="1"></li>
            <li data-target="#about-sections" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

	        <?php
                $aboutPost = get_posts(
                    array(
                        'post_type' => 'about_us'
                    )
                );

                $entries = get_post_meta( $aboutPost[0]->ID, 'about_group_field', true );

                foreach ( (array) $entries as $key => $entry ) {

	                ?><div class="item"><?php

	                    ?><div class="item-image"><?php
                        if ( isset( $entry['_about_image'] ) ) {
                            ?><img src="<?php echo $entry['_about_image']; ?>" /><?php
                        }
		                ?></div><?php

                        ?><div class="item-paragraph"><?php
                        if ( isset( $entry['_about_desc'] ) ) {
	                        ?><p><?php echo esc_html( $entry['_about_desc'] ); ?></p><?php
                        }
                        ?></div><?php

                    ?></div><?php
                }
	        ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#about-sections" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#about-sections" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
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
    <div id="offices" class="carousel slide" data-ride="carousel" data-interval="false">

        <!-- Flags Indicators -->
        <ol class="flags carousel-indicators">
            <li data-target="#offices" data-slide-to="0" class="flag-ven">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/ven_flag.svg" />
            </li>
            <li data-target="#offices" data-slide-to="1" class="flag-usa active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
            </li>
            <li data-target="#offices" data-slide-to="2" class="flag-spain">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
            </li>
        </ol>


        <h4>Puedes encontrar Nuestras Oficinas en:</h4>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item">
                <div class="office-detail">
                    <h5>
                        <span>Caracas:</span>
                    </h5>
                    <h5>Centro Empresarial Parque Humboldt</h5>
                    <h5>Piso 19, Oficinas 19-05 / 19-06</h5>
                    <h5>Teléfonos: +58 212 975 39 40 / 212 975 41 651</h5>
                </div>
            </div>

            <div class="item active">
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

            <div class="item">
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
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#offices" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#offices" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section id="contact-us">
    <div class="title">
        <h1>Nos gustaría asesorarte
            <span class="first">en tu próxima inversión</span>
            <span class="last">¡Contáctanos!</span>
        </h1>
    </div>
    <div class="inner-section">
        <div class="call-us">
            <div class="content">
                <div class="centered-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/d-iconphone.svg" />
                    <h2>Llámenos para asesoría <span class="bold-me">Inmediata</span></h2>
                    <h2 id="contact-phone" class="bold-me">+1 786 376.22.22</h2>
                </div>
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