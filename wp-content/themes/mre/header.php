<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- FIX HTML STYLES IE9 -->
    <!--[if gte IE 9]>
    <!--<style type="text/css">
      .gradient {
        filter: none;
      }
    </style>-->
    <![endif]-->

    <!-- FIX HTML JS-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  </head>
  <body>
  <header id="mre-header">
    <div class="swiper-container swiper-container-menu">
      <div class="swiper-wrapper">
        <div class="swiper-slide menu">
          <ul class="mre-menu">
            <li class="mre-menu-item"><a href="#">Sobre nosotros</a></li>
            <li class="mre-menu-item" id="menu-projects"><a href="#">Proyectos</a></li>
            <li class="mre-menu-item"><a href="#">HR19 realty</a></li>
            <li class="mre-menu-item"><a href="#">Grupo MRE</a></li>
            <li class="mre-menu-item" id="menu-contact"><a href="#">Contáctanos</a></li>
          </ul>
          <div class="mre-menu-language">
            <h2 class="mre-menu-language-text">Seleccione su idioma de preferencia:</h2>
            <img class="mre-menu-language-flag " src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Spanish">
            <img class="mre-menu-language-flag language-flag-active" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="English">
          </div>
          <div class="mre-menu-social">
            <ul class="menu-social-icons">
              <li class="menu-social-icon"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="menu-social-icon"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="menu-social-icon"><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li class="menu-social-icon"><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              <li class="menu-social-icon"><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
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
              <a href=""><img src="wp-content/themes/mre/assets/logo.png" alt="MRE Logo"></a>
            </div>
          </div>
          <div class="social-header pull-right">
            <ul class="social-icons">
              <li class="social-icon"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon"><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li class="social-icon"><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              <li class="social-icon"><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
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
  <div style="height: 100px; background: red;">
      hola
  </div>











