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
<body id="body" <?php body_class() ?>>
<div id="o-wrapper" class="o-wrapper">
    <div id="ala-header">
        <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div id="c-button--slide-left" class="menu-button c-button pull-right c-menu__close">
                    <div id="nav-icon4">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="logo-header">
                    <div class="img-div pull-right text-center">
                        <a href="<?php echo home_url(); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="140" height="47" viewBox="0 0 260 90"> <defs> <polygon id="a" points=".029 89.604 89.999 89.604 89.999 .001 .029 .001 .029 89.604"/> </defs> <g fill="none" fill-rule="evenodd"> <path fill="#231F20" d="M207.336399 30.9020056C205.937293 30.9020056 204.629474 31.0559864 203.409216 31.3677037 202.19082 31.6775431 201.128916 32.1432412 200.232818 32.7666758 199.334857 33.3863547 198.625058 34.1938152 198.101557 35.1834236 197.578057 36.1749099 197.317239 37.3297661 197.317239 38.6479922 197.317239 39.6976908 197.578057 40.6872992 198.101557 41.6205733 198.625058 42.5519695 199.334857 43.3669412 200.232818 44.0673661 201.128916 44.7659133 202.19082 45.3198687 203.409216 45.7273545 204.629474 46.1348404 205.937293 46.3395222 207.336399 46.3395222 208.731778 46.3395222 210.039597 46.1348404 211.261719 45.7273545 212.481977 45.3198687 213.551333 44.7659133 214.475376 44.0673661 215.395693 43.3669412 216.120397 42.5519695 216.643897 41.6205733 217.167397 40.6872992 217.428216 39.6976908 217.428216 38.6479922 217.428216 37.290332 217.167397 36.1242089 216.643897 35.1552564 216.120397 34.1825483 215.395693 33.3788435 214.475376 32.7366308 213.551333 32.0962959 212.481977 31.6287199 211.261719 31.3376586 210.039597 31.0484751 208.731778 30.9020056 207.336399 30.9020056M205.914937 53.5615985C203.072015 53.6799008 200.4955 53.3418941 198.176077 52.5438228 195.86038 51.7476293 193.866981 50.6509853 192.197742 49.2520132 190.52664 47.8530411 189.241177 46.2418758 188.343216 44.4166397 187.448981 42.5914036 187 40.6872992 187 38.7080823 187 37.3485443 187.147176 36.1242089 187.448981 35.0369541 187.747059 33.9496992 188.145739 32.9788689 188.643157 32.1263409 189.144301 31.2700573 189.680843 30.5226869 190.252781 29.882352 190.824718 29.2401393 191.409697 28.6880617 192.00958 28.2223636 193.254057 27.2515333 194.589821 26.4741179 196.00942 25.8919953 197.429018 25.3079948 198.848616 24.8535636 200.270078 24.5230682 201.691539 24.1925728 203.036618 23.9785019 204.307177 23.8827333 205.579599 23.7850869 206.688078 23.7362637 207.634477 23.7362637 209.875654 23.7362637 212.019956 23.9785019 214.065519 24.4648559 216.105493 24.95121 217.962894 25.6291012 219.633996 26.5022851 221.303235 27.3773469 222.750778 28.4251677 223.971036 29.649503 225.193158 30.8719605 226.100434 32.2221095 226.700317 33.698072 227.697016 36.1448649 228.119915 38.4846223 227.970876 40.7173443 227.821837 42.9500662 227.072915 45.2917015 225.725973 47.7366165 225.280718 48.47272 224.444236 49.6012868 223.222114 51.1166834 222.001856 52.6302023 220.582258 54.3089688 218.961456 56.1529831 217.340655 58.000753 215.634156 59.9029796 213.84196 61.8652962 212.046037 63.825735 210.376798 65.6209261 208.828654 67.2527473L195.895777 67.2527473C196.89434 66.2030487 197.965559 65.0688485 199.113161 63.8445131 200.257037 62.6220556 201.402776 61.3770643 202.550377 60.1170505 203.696116 58.8551588 204.843718 57.6007784 205.989457 56.3595428 207.135196 55.1164293 208.208278 53.9503062 209.203115 52.8649292 208.854736 52.9794759 208.407618 53.1165564 207.859899 53.2705372 207.310317 53.4263958 206.661996 53.5221644 205.914937 53.5615985M1 80.1098901L1 73.1868132 7.48948375 73.1868132C8.0917782 73.1868132 8.52963671 73.2917083 8.79923518 73.503441 9.0707457 73.7151737 9.20458891 74.0589966 9.20458891 74.5271395L9.20458891 76.1549562C9.20458891 76.6211566 9.0707457 76.963037 8.79923518 77.1728272 8.52963671 77.3884449 8.0917782 77.497225 7.48948375 77.497225L6.50095602 77.497225 10 80.1098901 7.46845124 80.1098901 4.41108987 77.497225 2.73613767 77.497225 2.73613767 80.1098901 1 80.1098901zM6.70745698 74.3853369L2.73613767 74.3853369 2.73613767 76.3122988 6.70745698 76.3122988C7.01338432 76.3122988 7.22370937 76.2715063 7.33652008 76.1899212 7.44741874 76.1102786 7.50478011 75.9665335 7.50478011 75.7625708L7.50478011 74.9292374C7.50478011 74.7272172 7.44741874 74.5834721 7.33652008 74.505772 7.22370937 74.4261294 7.01338432 74.3853369 6.70745698 74.3853369L6.70745698 74.3853369z"/> <polygon fill="#231F20" points="18 80.11 18 73.187 25.926 73.187 25.926 74.364 19.803 74.364 19.803 75.912 23.378 75.912 23.378 77.089 19.803 77.089 19.803 78.806 26 78.806 26 80.11"/> <path fill="#231F20" d="M33,80.1098901 L37.1497227,73.1868132 L38.792976,73.1868132 L43,80.1098901 L41.0831793,80.1098901 L40.2014787,78.5986236 L35.5526802,78.5986236 L34.6987061,80.1098901 L33,80.1098901 Z M36.2828096,77.3457098 L39.4935305,77.3457098 L37.9131238,74.5271395 L36.2828096,77.3457098 Z"/> <polygon fill="#231F20" points="51 80.11 51 73.187 52.658 73.187 52.658 78.806 58 78.806 58 80.11"/> <polygon fill="#231F20" points="75 80.11 75 73.187 82.928 73.187 82.928 74.364 76.803 74.364 76.803 75.912 80.376 75.912 80.376 77.089 76.803 77.089 76.803 78.806 83 78.806 83 80.11"/> <path fill="#231F20" d="M97.4353711,74.3966524 L92.7487029,74.3966524 L92.7487029,75.8841915 L97.2115949,75.8841915 C97.9117979,75.8841915 98.38642,76.0026509 98.6300474,76.2318019 C98.8790887,76.4648367 99,76.8940092 99,77.5251453 L99,78.4747623 C99,79.1020144 98.8790887,79.5292449 98.6300474,79.7642218 C98.38642,79.9933727 97.9117979,80.1098901 97.2115949,80.1098901 L92.7902098,80.1098901 C92.0900068,80.1098901 91.6153846,79.9933727 91.368148,79.7642218 C91.122716,79.5292449 91,79.1020144 91,78.4747623 L91,78.2825085 L92.4707873,77.989273 L92.4707873,78.8068369 L97.5292127,78.8068369 L97.5292127,77.2299678 L93.0681254,77.2299678 C92.369727,77.2299678 91.9023235,77.1115084 91.6550868,76.8823575 C91.4132642,76.6512646 91.2905482,76.2201501 91.2905482,75.590956 L91.2905482,74.8258249 C91.2905482,74.1946889 91.4132642,73.7635744 91.6550868,73.5324815 C91.9023235,73.3033306 92.369727,73.1868132 93.0681254,73.1868132 L97.1285811,73.1868132 C97.8035191,73.1868132 98.2673133,73.2975047 98.5217686,73.5188878 C98.7780284,73.7422129 98.9043537,74.1383721 98.9043537,74.7073656 L98.9043537,74.8491284 L97.4353711,75.187029 L97.4353711,74.3966524 Z"/> <polygon fill="#231F20" points="112.402 74.426 112.402 80.11 110.584 80.11 110.584 74.426 107 74.426 107 73.187 116 73.187 116 74.426"/> <path fill="#231F20" d="M121,80.1098901 L125.150804,73.1868132 L126.791905,73.1868132 L131,80.1098901 L129.081685,80.1098901 L128.200148,78.5986236 L123.554057,78.5986236 L122.70024,80.1098901 L121,80.1098901 Z M124.282203,77.3457098 L127.49233,77.3457098 L125.912216,74.5271395 L124.282203,77.3457098 Z"/> <polygon fill="#231F20" points="141.401 74.426 141.401 80.11 139.585 80.11 139.585 74.426 136 74.426 136 73.187 145 73.187 145 74.426"/> <polygon fill="#231F20" points="153 80.11 153 73.187 160.928 73.187 160.928 74.364 154.802 74.364 154.802 75.912 158.378 75.912 158.378 77.089 154.802 77.089 154.802 78.806 161 78.806 161 80.11"/> <path fill="#231F20" d="M21.0067689,53.46573 L36.9154704,53.46573 L28.9990517,40.6069735 L21.0067689,53.46573 Z M0,67.2527473 L28.4661064,24.7252747 L29.531997,24.7252747 L58,67.2527473 L46.430725,67.2527473 L42.0912985,60.5636435 L15.8309408,60.5636435 L11.569275,67.2527473 L0,67.2527473 Z"/> <polygon fill="#231F20" points="100 59.059 100 66.264 60 66.264 60 23.736 70.627 23.736 70.627 59.059"/> <path fill="#231F20" d="M125.006082,53.46573 L140.914263,53.46573 L133,40.6069735 L125.006082,53.46573 Z M104,67.2527473 L132.467072,24.7252747 L133.532928,24.7252747 L162,67.2527473 L150.429207,67.2527473 L146.089922,60.5636435 L119.830423,60.5636435 L115.568897,67.2527473 L104,67.2527473 Z"/> <g transform="translate(170)"> <mask id="b" fill="white"> <use xlink:href="#a"/> </mask> <polygon fill="#7F8080" points="11.201 78.45 78.825 78.45 78.825 11.155 11.201 11.155 11.201 21.666 .029 21.666 .029 .001 3.262 .001 89.997 .001 89.997 1.474 89.999 1.474 89.999 89.604 86.673 89.604 78.825 89.604 .029 89.604 .029 86.95 .029 69.423 11.201 69.423" mask="url(#b)"/> </g> <polygon fill="#231F20" points="181 23.736 181 66.264 170.592 66.264 170.592 37.718 165.468 41.527 161 33.646 174.383 23.736"/> </g></svg></a>
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
            </div>
        </nav>
