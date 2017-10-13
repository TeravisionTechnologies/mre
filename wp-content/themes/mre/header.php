<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
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
  <body <?php body_class() ?>>
    <?php
    $headerPost = get_posts(
      array(
        'post_type' => 'header_footer',
        'numberposts' => 1
      )
    );
    $theMeta = get_post_meta($headerPost[0]->ID);
    $social_networks = get_post_meta( $headerPost[0]->ID, '_hf_social_networks', true );
    ?>
    <div id="mre-header">
      <div class="swiper-container swiper-container-menu">
        <div class="swiper-wrapper">
          <div class="swiper-slide menu">
            <ul class="mre-menu">
              <li class="mre-menu-item" id="menu-about"><a href="#">Sobre nosotros</a></li>
              <li class="mre-menu-item"><a href="#">Developer</a></li>
              <li class="mre-menu-item"><a href="#">Inmobiliaria</a></li>
              <li class="mre-menu-item"><a href="/blog">Blog</a></li>
              <li class="mre-menu-item" id="menu-contact"><a href="#">Contáctanos</a></li>
            </ul>
            <div class="mre-menu-language">
              <h2 class="mre-menu-language-text">Seleccione su idioma de preferencia:</h2>
              <img class="mre-menu-language-flag " src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Spanish">
              <img class="mre-menu-language-flag language-flag-active" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="English">
            </div>
            <div class="mre-menu-social">
              <?php if(isset($social_networks[0])) { ?>
              <ul class="menu-social-icons">
                <?php if(isset($social_networks[0]['_hf_linkedin'])) { ?>
                  <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($social_networks[0]['_hf_facebook'])) { ?>
                  <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($social_networks[0]['_hf_instagram'])) { ?>
                  <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($social_networks[0]['_hf_twitter'])) { ?>
                  <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($social_networks[0]['_hf_youtube'])) { ?>
                  <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
            </div>
          </div>
          <div class="swiper-slide content">
            <div class="menu-bar">
              <div class="menu-button">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
              </div>
              <div class="logo-header">
                <div class="img-div pull-right">
                  <a href="/"><img src="<?php echo $theMeta['_hf_logo'][0];  ?>" alt="MRE Logo"></a>
                </div>
              </div>
              <div class="social-header pull-right">
                <?php if(isset($social_networks[0])) { ?>
                <ul class="social-icons">
                  <?php if(isset($social_networks[0]['_hf_linkedin'])) { ?>
                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_facebook'])) { ?>
                  <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_instagram'])) { ?>
                  <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_twitter'])) { ?>
                  <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_youtube'])) { ?>
                  <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  <?php } ?>
                </ul>
                <?php } ?>
              </div>
            </div>