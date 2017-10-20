<!DOCTYPE html>

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
<!--<div id="o-wrapper" class="o-wrapper">
  <div id="hr-header">
    <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div id="c-button--slide-left" class="menu-button c-button pull-right">
          <div id="nav-icon4">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="logo-header">
          <div class="img-div pull-right text-center">
            <a href="<?php /*echo home_url(); */?>"><img src="<?php /*echo get_template_directory_uri(); */?>/assets/hr19.svg" alt="HR19 Logo"></a>
          </div>
        </div>
        <div class="social-header pull-right">
          <?php /*if (isset($social_networks[0])) { */?>
            <ul class="social-icons">
              <?php /*if (isset($social_networks[0]['_hf_linkedin'])) { */?>
                <li class="social-icon"><a href="<?php /*echo $social_networks[0]['_hf_linkedin'] */?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <?php /*} */?>
              <?php /*if (isset($social_networks[0]['_hf_facebook'])) { */?>
                <li class="social-icon"><a href="<?php /*echo $social_networks[0]['_hf_facebook'] */?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <?php /*} */?>
              <?php /*if (isset($social_networks[0]['_hf_instagram'])) { */?>
                <li class="social-icon"><a href="<?php /*echo $social_networks[0]['_hf_instagram'] */?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <?php /*} */?>
              <?php /*if (isset($social_networks[0]['_hf_twitter'])) { */?>
                <li class="social-icon"><a href="<?php /*echo $social_networks[0]['_hf_twitter'] */?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <?php /*} */?>
              <?php /*if (isset($social_networks[0]['_hf_youtube'])) { */?>
                <li class="social-icon"><a href="<?php /*echo $social_networks[0]['_hf_youtube'] */?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              <?php /*} */?>
            </ul>
          <?php /*} */?>
        </div>
      </div>
    </nav>-->