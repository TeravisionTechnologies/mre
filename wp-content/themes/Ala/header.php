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
    <div id="ala-header">
      <div class="swiper-container swiper-container-menu">
        <div class="swiper-wrapper">
          <div class="swiper-slide menu">
            <ul class="al-menu">
              <li class="al-menu-item"><a href="#">Sobre nosotros</a></li>
              <li class="al-menu-item" id="menu-projects"><a href="#">Proyectos</a></li>
              <li class="al-menu-item"><a href="#">HR19 realty</a></li>
              <li class="al-menu-item"><a href="#">Grupo MRE</a></li>
              <li class="al-menu-item" id="menu-contact"><a href="#">Contáctanos</a></li>
            </ul>
            <div class="al-menu-language">
              <h2 class="al-menu-language-text">Seleccione su idioma de preferencia:</h2>
              <img class="al-menu-language-flag " src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Español">
              <img class="al-menu-language-flag language-flag-active" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="Inglés">
            </div>
            <div class="al-menu-social">
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
              <div class="bar "></div>
              <div class="bar "></div>
              <div class="bar "></div>
            </div>
            <div class="logo-header">
              <div class="img-div pull-right">
                <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/logo.jpg" alt="Ala19 Logo"></a>
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
