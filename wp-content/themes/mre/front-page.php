<?php

get_header();

$headerPost = get_posts(
  array(
    'post_type' => 'header_footer',
    'numberposts' => 1
  )
);
$theMeta = get_post_meta($headerPost[0]->ID);
?>

<section id="mre-about-us" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/about-us-bg.jpg');" alt="About Us Background">
  <h3 class="about-us-title no-margin">Sobre Nosotros</h3>
  <h2 class="about-us-sub-first no-margin">Bienvenido a</h2>
  <h2 class="about-us-sub-second no-margin">Grupo Merand Real Estate</h2>
  <img class="about-us-image" src="<?php echo get_template_directory_uri(); ?>/assets/about-us.png" alt="About Us">
  <p class="about-us-text"><strong>Somos un holding inmobiliario Premium</strong>, con más de 15 años de experiencia en el manejo de portafolios inmobiliarios exclusivos y de lujo en Miami, Orlando, Caracas y Madrid. Desarrollamos las últimas tendencias del Real Estate y el Luxury Lifestyle para ofrecerles a nuestros clientes una experiencia personalizada y acorde a sus deseos.</p>
  <ul class="about-us-numbers">
    <li>
      <h2 class="numbers no-margin">+500</h2>
      <h3 class="title no-margin">Inversionistas</h3>
    </li>
    <li>
      <h2 class="numbers no-margin">+160.000</h2>
      <h3 class="title no-margin">Ventas al Año</h3>
    </li>
    <li>
      <h2 class="numbers no-margin">+800</h2>
      <h3 class="title no-margin">Rentas por Mes</h3>
    </li>
  </ul>
</section>
<section id="mre-partners" class="container-fluid no-padding">
  <div class="col-xs-12 col-md-6 partner-left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-1.jpg');">
    <div class="overlay-left">
      <h3 class="partners-title-first">Proyectos inmobiliarios</h3>
      <h2 class="partners-title-second">EXCLUSIVOS</h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-hr19.png">
    </div>
  </div>
  <div class="col-xs-12 col-md-6 partner-right" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-2.jpg');">
    <div class="overlay-right">
      <h3 class="partners-title-first">Encuentra la propiedad</h3>
      <h2 class="partners-title-second">PERFECTA PARA TI</h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-ala19.png">
    </div>
  </div>
</section>
<section id="mre-offices" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/offices.jpg');">
  <div class="swiper-container swiper-container-flags">
    <h4>Puedes <strong>encontrarnos</strong> en</h4>
    <div class="flags-indicators">
      <img id="flag-image-1" class="flag-image flag-image-opacity" data-pagination="1" src="<?php echo get_template_directory_uri(); ?>/assets/ven_flag.svg" />
      <img id="flag-image-2" class="flag-image" data-pagination="2" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
      <img id="flag-image-3" class="flag-image flag-image-opacity" data-pagination="3" src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
    </div>
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="office-detail">
          <h5>
            <span>Caracas:</span>
          </h5>
          <h5>Calle Ortega y Gasset #6</h5>
          <h5>Primero Izquierda</h5>
          <h5>Sample: +34 605 816 803</h5>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="office-detail">
          <h5>
            <span>Orlando:</span>
          </h5>
          <h5>2295 S. Hiawassee Road, Suite 407E</h5>
          <h5>Orlando, Florida</h5>
          <h5>Teléfonos: +1 407 255.08.71</h5>
        </div>
        <div class="office-detail">
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
          <h5>C/ Velázquez 78</h5>
          <h5>2º Dcha</h5>
          <h5>28001 Madrid, Spain</h5>
        </div>
      </div>
    </div>
  </div>
</section>


<!--<section id="before-contact-us">
    <div id="offices" class="swiper-container">
        <div class="flags-indicators">
            <img data-pagination="1" src="<?php /*/*echo get_template_directory_uri(); */?>/assets/ven_flag.svg" />
            <img data-pagination="2" src="<?php /*/*echo get_template_directory_uri(); */?>/assets/usa_flag.svg" />
            <img data-pagination="3" src="<?php /*/*echo get_template_directory_uri(); */?>/assets/spain_flag.svg" />
        </div>
        <h4>Puedes encontrar Nuestras Oficinas en:</h4>

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

        <div class="swiper-pagination"></div>
    </div>
</section>-->

<!--<section id="contact-us">
    <div class="spacer initial"></div>
    <h1 class="title">Nos gustaría asesorarte
        <span class="first">en tu próxima inversión</span>
        <span class="last">¡Contáctanos!</span>
    </h1>
    <div class="spacer"></div>
    <div class="inner-section">
        <div class="form-errors"></div>
        <div class="call-us">
            <div class="content">
                <div class="spacer-before-image"></div>
                <img src="<?php /*/*echo get_template_directory_uri(); */?>/assets/d-iconphone.svg" />
                <h2 id="advice-call">Llámenos para asesoría <span class="bold-me">Inmediata</span></h2>
                <h2 id="contact-phone" class="bold-me">+1 786 376.22.22</h2>
                <div class="spacer-end"></div>
            </div>
        </div>
        <div class="the-form">
            <?php /*/*echo do_shortcode( '[contact-form-7 id="5" title="Home - Contact form"]' ); */?>
        </div>
    </div>
</section>-->

  <?php get_footer(); ?>
	</body>
</html>