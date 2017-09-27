<!DOCTYPE html>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./wp-content/themes/ala19/css/swiper.min.css">

    <!-- FIX HTML STYLES IE9 -->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
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
    <header>

    </header>
    <!-- Swiper -->
    <div class="swiper-container swiper-container-menu">
      <div class="swiper-wrapper">
        <div class="swiper-slide menu">Menu slide</div>
        <div class="swiper-slide content">
          <div id="mainContainer" class="menu-button">
            <div class="bar "></div>
            <div class="bar "></div>
            <div class="bar "></div>
          </div>
          <div class="logo-header">
            <div class="img-div">
              <img src="wp-content/themes/Ala/assets/logo.png" alt="Ala19 Logo">
            </div>
            <div class="sm-div">test</div>
          </div>
          <div id="al-carousel-hero" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/spain-1.jpg">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
              <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/spain-2.jpg">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
              <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/spain-3.jpg">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
            </div>
            <a class="left carousel-control" href="#al-carousel-hero" role="button" data-slide="prev">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-left.png">
            </a>
            <a class="right carousel-control" href="#al-carousel-hero" role="button" data-slide="next">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-right.png">
            </a>
          </div>
        </div>
      </div>
    </div>
    