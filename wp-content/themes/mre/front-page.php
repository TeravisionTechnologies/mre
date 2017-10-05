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
<header id="mre-header">
  <div class="swiper-container swiper-container-menu">
    <div class="swiper-wrapper">
      <div class="swiper-slide menu">
        <ul class="mre-menu">
          <li class="mre-menu-item" id="menu-about"><a href="#">Sobre nosotros</a></li>
          <li class="mre-menu-item"><a href="#">Developer</a></li>
          <li class="mre-menu-item"><a href="#">Inmobiliaria</a></li>
          <li class="mre-menu-item"><a href="#">Blog</a></li>
          <li class="mre-menu-item" id="menu-contact"><a href="#">Contáctanos</a></li>
        </ul>
        <div class="mre-menu-language">
          <h2 class="mre-menu-language-text">Seleccione su idioma de preferencia:</h2>
          <img class="mre-menu-language-flag " src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Spanish">
          <img class="mre-menu-language-flag language-flag-active" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="English">
        </div>
        <div class="mre-menu-social">
          <ul class="menu-social-icons">
            <li class="menu-social-icon"><a href="https://www.linkedin.com/company/11285534/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li class="menu-social-icon"><a href="https://www.facebook.com/MerandRealEstate/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="menu-social-icon"><a href="https://www.instagram.com/grupomre/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li class="menu-social-icon"><a href="https://twitter.com/grupomre"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class="menu-social-icon"><a href="https://www.youtube.com/channel/UCj1GOp1JCfAaSmBdQn5uU9w?view_as=subscriber"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="swiper-slide content">
        <div class="menu-button">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
        <div class="logo-header">
          <div class="img-div pull-right">
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="MRE Logo"></a>
          </div>
        </div>
        <div class="social-header pull-right">
          <ul class="social-icons">
            <li class="social-icon"><a href="https://www.linkedin.com/company/11285534/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li class="social-icon"><a href="https://www.facebook.com/MerandRealEstate/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="social-icon"><a href="https://www.instagram.com/grupomre/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li class="social-icon"><a href="https://twitter.com/grupomre"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class="social-icon"><a href="https://www.youtube.com/channel/UCj1GOp1JCfAaSmBdQn5uU9w?view_as=subscriber"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div class="swiper-container swiper-container-hero">
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-1.jpg');">
              <div class="slide-overlay"></div>
              <div class="slide-text">
                <h2>Comprometidos con tu</h2>
                <h3>TU FUTURO</h3>
              </div>
            </div>
            <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-2.jpg');">
              <div class="slide-overlay"></div>
              <div class="slide-text">
                <h2>Especialistas en</h2>
                <h3>LUXURY RENTAL</h3>
              </div>
            </div>
            <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-3.jpg');">
              <div class="slide-overlay"></div>
              <div class="slide-text">
                <h2>Innovación y diseño</h2>
                <h3>VANGUARDISTA</h3>
              </div>
            </div>
            <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/hero-4.jpg');">
              <div class="slide-overlay"></div>
              <div class="slide-text">
                <h2>Estamos contigo en</h2>
                <h3>TODO MOMENTO</h3>
              </div>
            </div>
          </div>
          <i class="fa fa-chevron-circle-left swiper-button-prev" aria-hidden="true"></i>
          <i class="fa fa-chevron-circle-right swiper-button-next" aria-hidden="true"></i>
        </div>
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/hero-arrow.svg" class="hero-button"></a>
      </div>
    </div>
  </div>
</header>
<section id="mre-about-us" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/about-us-bg.jpg');" alt="About Us Background">
  <img class="about-us-image" src="<?php echo get_template_directory_uri(); ?>/assets/about-us.png" alt="About Us">
  <h2 class="about-us-title no-margin">Grupo Merand Real Estate</h2>
  <p class="about-us-text"><strong>Somos un holding inmobiliario Premium</strong>, con más de 15 años de experiencia en el manejo de portafolios inmobiliarios exclusivos en Miami, Orlando, Las Vegas y Madrid. Ponemos en práctica las últimas tendencias del Real Estate y el Luxury Lifestyle para ofrecerles a nuestros clientes una experiencia personalizada, superando sus expectativas.</p>
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
  <div class="col-xs-12 col-md-6 partner-left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/partner-ala19.jpg');">
    <div class="overlay-left">
      <h3 class="partners-title-first">Proyectos inmobiliarios</h3>
      <h2 class="partners-title-second">EXCLUSIVOS</h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-ala19.png">
    </div>
  </div>
  <div class="col-xs-12 col-md-6 partner-right" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/partner-hr19.jpg');">
    <div class="overlay-right">
      <h3 class="partners-title-first">Encuentra la propiedad</h3>
      <h2 class="partners-title-second">PERFECTA PARA TI</h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-hr19.png">
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
          <h5>Centro Empresarial, Piso 19, Oficinas 19-05 / 06</h5>
          <h5>Venezuela</h5>
          <h5>Teléfonos: +58 212 975 39 40 / 212 975 41 651</h5>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="office-detail">
          <h5>
            <span>Miami · Sede principal:</span>
          </h5>
          <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
          <h5>USA</h5>
          <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
        </div>
        <div class="office-detail">
          <h5>
            <span>Orlando:</span>
          </h5>
          <h5>2295 S. Hiawassee Road, Suite 407E</h5>
          <h5>USA</h5>
          <h5>Teléfonos: +1 407 255.08.71</h5>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="office-detail">
          <h5>
            <span>Madrid:</span>
          </h5>
          <h5>C/ Velázquez 78, 2º Dcha. 28001</h5>
          <h5>España</h5>
          <h5>Teléfonos: +34 605 816 803</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="contact-us" class="col-xs-12 al-contact-div" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/contact-us-bg.png"')">
  <div class="container-mre center-block">
    <div class="row">
      <p class="col-xs-12 text-center al-contact-text">Nos gustaría asesorarte en tu próxima inversión</p>
      <p class="col-xs-12 text-center al-contact-text-bold">¡Contáctanos!</p>
      <div class="col-xs-12 col-md-4 no-padding">
        <div class="al-phone-box text-center center-block">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.png" alt="Llamanos Ala19">
          <p>Llámanos para asesoría <strong>Inmediata</strong></p>
          <a href="tel:+17864775091" class="al-phone-num">+1786 477.50.91</a>
        </div>
      </div>
      <div class="col-xs-12 col-md-8 al-contact-form-div no-padding">
        <?php echo do_shortcode( '[contact-form-7 id="4" title="Home - Contact form"]' ); ?>
      </div>
    </div>
  </div>
</section>

  <?php get_footer(); ?>
	</body>
</html>