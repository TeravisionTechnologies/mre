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
    
    <style>
        p{
            font-family: "Archivo", sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #8f8f8f;
            margin: 0 0 22px !important;
            padding: 0 100px;
        }
        .memory-items{
            padding: 0 100px;
        }
        .memory-items img{
            margin: 40px 0;
        }
        ul, ol{
            font-family: "Archivo", sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #8f8f8f;
            margin: 0 0 22px !important;
            text-align: left;
        }
        .prop-header{
            height: 600px;
            position: relative;
            margin-bottom: 40px;
            background-repeat: no-repeat !important;
            background-position: center center !important;
            -ms-background-size: cover !important;
            -o-background-size: cover !important;
            -moz-background-size: cover !important;
            -webkit-background-size: cover !important;
            background-size: cover !important;
        }
        .prop-header h1{
            position: absolute;
            left: 0;
            right: 0;
            top: -35px;
            bottom: 0;
            height: 40px;
            margin: auto;
            font-size: 36px;
            letter-spacing: 8px;
            text-align: center;
            font-family: "Archivo", sans-serif;
            text-transform: uppercase;
            color: #ffffff;
        } 
        .prop-header h2{
            font-family: "Archivo", sans-serif;
            font-size: 20px;
            letter-spacing: -0.1px;
            text-align: center;
            color: #ffffff;
            position: absolute;
            left: 0;
            right: 0;
            top: 35px;
            bottom: 0;
            height: 22px;
            margin: auto;
        }
        .detail-tlt{
            height: 80px;
            background-color: #000000;
            font-family: "Archivo", sans-serif;
            text-transform: uppercase;
            font-size: 24px;
            letter-spacing: 8px;
            text-align: center;
            color: #ffffff;
            padding: 24px 15px;
            margin: 50px 0;
        }
        .amenimg{
            overflow: hidden;
            height: 350px;
        }
        #map {
            height: 486px;
            width: 100%;
            margin-top: -50px;
       }
    </style>

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

        </div>
        <div class="swiper-slide content">
          <div id="mainContainer" class="menu-button">
            <div class="bar "></div>
            <div class="bar "></div>
            <div class="bar "></div>
          </div>
          <div class="logo-header">
            <div class="img-div">
              <img src="wp-content/themes/Ala/assets/logo.jpg" alt="Ala19 Logo">
            </div>
          </div>
          <div id="al-carousel-hero" class="carousel vertical" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-1.jpg')">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
              <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-2.jpg')">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
              <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-3.jpg')">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Madrid</div>
              </div>
              <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/vegas-1.jpg')">
                <div class="item-overlay"></div>
                <div class="carousel-caption">Las Vegas</div>
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
    <section class="col-xs-12 al-projects">
      <div class="container center-block al-project-list">
        <span class="al-project-list-item"><h2 class="item-text">Proyectos pasados</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
        <span class="al-project-list-item"><h2 class="item-text item-active">Proyectos actuales</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
        <span class="al-project-list-item"><h2 class="item-text">Muy pronto</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
      </div>
    </section>