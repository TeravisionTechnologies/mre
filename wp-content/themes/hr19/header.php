<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> » <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
          content="<?php echo get_template_directory_uri(); ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqLg2ArgqBdOHK6Nmro4hoJ0ixlBurD_s"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js"></script>
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
</head>
<?php
$headerPost = get_posts(
    array(
        'post_type' => 'header_footer',
        'numberposts' => 1
    )
);
$theMeta = get_post_meta($headerPost[0]->ID);
$social_networks = get_post_meta($headerPost[0]->ID, '_hf_social_networks', true);
$referer = wp_get_referer();
if ( (strpos($referer, "en")  == true) or strpos($_SERVER['REQUEST_URI'], "en") == true ){
	$langu = "en";
}
?>
<body <?php body_class() ?>>
<div id="o-wrapper" class="o-wrapper">
    <div id="hr-header">
        <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div id="c-button--slide-left" class="menu-button c-button pull-right">
                        <div id="nav-icon4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="logo-header">
                        <div class="img-div pull-right text-center">
                            <a href="<?php echo ( $langu == "en" ? home_url().'/en' : home_url() ) ?>"><img src="<?php echo $theMeta['_hf_header_logo'][0]; ?>"
                                                                     alt="HR19 Logo"></a>
                        </div>
                    </div>
                    <div class="social-header pull-right">
                        <?php if (isset($social_networks[0])) { ?>
                            <ul class="social-icons">
                                <?php if (isset($social_networks[0]['_hf_linkedin'])) { ?>
                                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>"
                                                               target="_blank"><i class="fa fa-linkedin"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php } ?>
                                <?php if (isset($social_networks[0]['_hf_facebook'])) { ?>
                                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>"
                                                               target="_blank"><i class="fa fa-facebook"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php } ?>
                                <?php if (isset($social_networks[0]['_hf_instagram'])) { ?>
                                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>"
                                                               target="_blank"><i class="fa fa-instagram"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php } ?>
                                <?php if (isset($social_networks[0]['_hf_twitter'])) { ?>
                                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>"
                                                               target="_blank"><i class="fa fa-twitter"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php } ?>
                                <?php if (isset($social_networks[0]['_hf_youtube'])) { ?>
                                    <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>"
                                                               target="_blank"><i class="fa fa-youtube-play"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>