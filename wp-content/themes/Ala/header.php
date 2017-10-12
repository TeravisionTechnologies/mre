<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Archivo:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
    /* -----------------------------------------------------------------------------

      WRAPPER OBJECT

    ----------------------------------------------------------------------------- */
    .o-wrapper {
        -webkit-transition: -webkit-transform 0.3s;
        transition: transform 0.3s;
    }

    /* -----------------------------------------------------------------------------

      CONTAINER OBJECTS

    ----------------------------------------------------------------------------- */
    .o-container {
        margin: 0 auto;
        padding: 0 12px;
        max-width: 960px;
    }

    @media all and (min-width: 480px) {
        .o-container {
            padding: 0 24px;
        }
    }
    @media all and (min-width: 720px) {
        .o-container {
            padding: 0 48px;
        }
    }

    /* -----------------------------------------------------------------------------

      SLIDE AND PUSH MENUS COMPONENT

    ----------------------------------------------------------------------------- */
    /**
     * Menu overview.
     */
    .c-menu {
        position: fixed;
        z-index: 200;
        background-color: #fff;
        -webkit-transition: -webkit-transform 0.3s;
        transition: transform 0.3s;
    }

    .c-menu__items {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /**
     * Left and right menus
     *
     * Slide and push menus coming in from the left and right inherit a lot of
     * common styles. We'll start each of them off by doing up the common styles
     * for each version, followed by individual styles.
     *
     * The various versions are governed by modifier classes.
     */
    /**
     * Common modifiers for left/right menus.
     */
    .c-menu--slide-left,
    .c-menu--slide-right,
    .c-menu--push-left,
    .c-menu--push-right {
        width: 100%;
        height: 100%;
        z-index: 99999;
    }
    @media all and (min-width: 320px) {
        .c-menu--slide-left,
        .c-menu--slide-right,
        .c-menu--push-left,
        .c-menu--push-right {
            width: 300px;
        }
    }

    .c-menu--slide-left .c-menu__item,
    .c-menu--slide-right .c-menu__item,
    .c-menu--push-left .c-menu__item,
    .c-menu--push-right .c-menu__item {
        display: block;
        text-align: center;
        border-top: solid 1px #b5dbe9;
        border-bottom: solid 1px #3184a1;
    }
    .c-menu--slide-left .c-menu__item:first-child,
    .c-menu--slide-right .c-menu__item:first-child,
    .c-menu--push-left .c-menu__item:first-child,
    .c-menu--push-right .c-menu__item:first-child {
        border-top: none;
    }
    .c-menu--slide-left .c-menu__item:last-child,
    .c-menu--slide-right .c-menu__item:last-child,
    .c-menu--push-left .c-menu__item:last-child,
    .c-menu--push-right .c-menu__item:last-child {
        border-bottom: none;
    }

    .c-menu--slide-left .c-menu__link,
    .c-menu--slide-right .c-menu__link,
    .c-menu--push-left .c-menu__link,
    .c-menu--push-right .c-menu__link {
        display: block;
        padding: 12px 24px;
        color: #fff;
    }

    .c-menu--slide-left .c-menu__close,
    .c-menu--slide-right .c-menu__close,
    .c-menu--push-left .c-menu__close,
    .c-menu--push-right .c-menu__close {
        display: block;
        padding: 12px 24px;
        width: 100%;
    }

    /**
     * Slide/Push Menu Left.
     */
    .c-menu--slide-left,
    .c-menu--push-left {
        top: 0;
        left: 0;
        -webkit-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
        transform: translateX(-100%);
    }
    @media all and (min-width: 320px) {
        .c-menu--slide-left,
        .c-menu--push-left {
            -webkit-transform: translateX(-300px);
            -ms-transform: translateX(-300px);
            transform: translateX(-300px);
        }
    }

    .c-menu--slide-left.is-active,
    .c-menu--push-left.is-active {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }

    /**
     * Slide/Push Menu Right.
     */
    .c-menu--slide-right,
    .c-menu--push-right {
        top: 0;
        right: 0;
        -webkit-transform: translateX(100%);
        -ms-transform: translateX(100%);
        transform: translateX(100%);
    }
    @media all and (min-width: 320px) {
        .c-menu--slide-right,
        .c-menu--push-right {
            -webkit-transform: translateX(300px);
            -ms-transform: translateX(300px);
            transform: translateX(300px);
        }
    }

    .c-menu--slide-right.is-active,
    .c-menu--push-right.is-active {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }

    /**
     * Top and bottom menus
     *
     * Slide and push menus coming in from the top and bottom inherit a lot of
     * common styles. We'll start each of them off by doing up the common styles
     * for each version, followed by individual styles.
     *
     * The various versions are governed by modifier classes.

    /**
     * Common modifiers for top/bottom menus
     */
    .c-menu--slide-top,
    .c-menu--slide-bottom,
    .c-menu--push-top,
    .c-menu--push-bottom {
        vertical-align: middle;
        width: 100%;
        height: 60px;
        text-align: center;
        overflow-x: scroll;
    }

    .c-menu--slide-top .c-menu__items,
    .c-menu--slide-bottom .c-menu__items,
    .c-menu--push-top .c-menu__items,
    .c-menu--push-bottom .c-menu__items {
        display: inline-block;
        text-align: center;
    }

    .c-menu--slide-top .c-menu__item,
    .c-menu--slide-bottom .c-menu__item,
    .c-menu--push-top .c-menu__item,
    .c-menu--push-bottom .c-menu__item {
        display: inline-block;
        line-height: 60px;
    }

    .c-menu--slide-top .c-menu__link,
    .c-menu--slide-bottom .c-menu__link,
    .c-menu--push-top .c-menu__link,
    .c-menu--push-bottom .c-menu__link {
        display: block;
        padding: 0 4px;
        color: #fff;
    }

    .c-menu--slide-top .c-menu__close,
    .c-menu--slide-bottom .c-menu__close,
    .c-menu--push-top .c-menu__close,
    .c-menu--push-bottom .c-menu__close {
        display: inline-block;
        margin-right: 12px;
        padding: 0 24px;
        height: 60px;
        line-height: 60px;
    }

    /**
     * Slide/Push Menu Top.
     */
    .c-menu--slide-top,
    .c-menu--push-top {
        top: 0;
        left: 0;
        -webkit-transform: translateY(-60px);
        -ms-transform: translateY(-60px);
        transform: translateY(-60px);
    }

    .c-menu--slide-top.is-active,
    .c-menu--push-top.is-active {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    /**
     * Slide/Push Menu Bottom.
     */
    .c-menu--slide-bottom,
    .c-menu--push-bottom {
        bottom: 0;
        left: 0;
        -webkit-transform: translateY(60px);
        -ms-transform: translateY(60px);
        transform: translateY(60px);
    }

    .c-menu--slide-bottom.is-active,
    .c-menu--push-bottom.is-active {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    /**
     * Wrapper states.
     *
     * Various wrapper states occur depending on if a menu is pushing into view, in
     * which case, the wrapper has to be pushed by the respective distance.
     */
    .o-wrapper.has-push-left {
        -webkit-transform: translateX(100%);
        -ms-transform: translateX(100%);
        transform: translateX(100%);
    }
    @media all and (min-width: 320px) {
        .o-wrapper.has-push-left {
            -webkit-transform: translateX(300px);
            -ms-transform: translateX(300px);
            transform: translateX(300px);
        }
    }

    .o-wrapper.has-push-right {
        -webkit-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
        transform: translateX(-100%);
    }
    @media all and (min-width: 320px) {
        .o-wrapper.has-push-right {
            -webkit-transform: translateX(-300px);
            -ms-transform: translateX(-300px);
            transform: translateX(-300px);
        }
    }

    .o-wrapper.has-push-top {
        -webkit-transform: translateY(60px);
        -ms-transform: translateY(60px);
        transform: translateY(60px);
    }

    .o-wrapper.has-push-bottom {
        -webkit-transform: translateY(-60px);
        -ms-transform: translateY(-60px);
        transform: translateY(-60px);
    }

    /**
     * Body states.
     *
     * When a menu is active, we want to hide the overflows on the body to prevent
     * awkward document scrolling.
     */
    body.has-active-menu {
        overflow: hidden;
    }

    /**
     * Close button resets.
     */
    .c-menu__close {
        color: #fff;
        background-color: #3184a1;
        font-size: 14px;
        border: none;
        box-shadow: none;
        border-radius: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
    }

    .c-menu__close:focus {
        outline: none;
    }

    /* -----------------------------------------------------------------------------

      MASK COMPONENT

    ----------------------------------------------------------------------------- */
    .c-mask {
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        overflow: hidden;
        width: 0;
        height: 0;
        background-color: #000;
        opacity: 0;
        -webkit-transition: opacity 0.3s, width 0s 0.3s, height 0s 0.3s;
        transition: opacity 0.3s, width 0s 0.3s, height 0s 0.3s;
    }

    .c-mask.is-active {
        width: 100%;
        height: 100%;
        opacity: 0.7;
        -webkit-transition: opacity 0.3s;
        transition: opacity 0.3s;
    }

    /* -----------------------------------------------------------------------------

      BUTTONS

    ----------------------------------------------------------------------------- */
    .c-buttons {
        margin-bottom: 48px;
        text-align: center;
    }

    .c-button {
        display: inline-block;
        padding: 12px 24px;
        color: #fff;
        background: none;
        font-size: 14px;
        border: solid 2px #fff;
        box-shadow: none;
        border-radius: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
    }

    .c-button:focus {
        outline: none;
    }

    .c-button:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }
</style>
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
<body id="body" <?php body_class() ?>>
<div id="o-wrapper" class="o-wrapper">
    <div id="ala-header">
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
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo $theMeta['_hf_header_logo'][0];  ?>" alt="ALA19 Logo"></a>
                    </div>
                </div>
                <div class="social-header pull-right">
                    <?php if(isset($social_networks[0])) { ?>
                    <ul class="social-icons">
                        <?php if(isset($social_networks[0]['_hf_linkedin'])) { ?>
                        <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if(isset($social_networks[0]['_hf_facebook'])) { ?>
                        <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if(isset($social_networks[0]['_hf_instagram'])) { ?>
                        <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if(isset($social_networks[0]['_hf_twitter'])) { ?>
                        <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if(isset($social_networks[0]['_hf_youtube'])) { ?>
                        <li class="social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
