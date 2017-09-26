<!DOCTYPE html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

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
        <div class="container col-xs-12">
            <div class="center-header">
                <div class="header-logo pull-left">
                    <?php
                        $headerPost = get_posts(
                            array(
                                'post_type' => 'header_footer'
                            )
                        );
                        $theMeta = get_post_meta($headerPost[0]->ID);
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ) ?>">
                        <img src="<?php echo $theMeta['_hf_logo'][0] ?>" />
                    </a>
                </div>
                <?php
                    wp_nav_menu(
                            array(
                                'menu'              => 'Primary',
                                'theme_location'    => 'Primary Menu',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'visible-desktop pull-right',
                                'container_id'      => 'bs-header-navbar',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker()
                            )
                    );
                ?>
                <div id="bs-header-navbar-nodesktop-parent" class="pull-right visible-mobile">
                    <a>
                        <span class="fa fa-bars" onclick="openNav()"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Overlay Menu (tablet and mobile) -->
    <div id="overlay-nav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/close-btn.svg" />
        </a>

        <!-- Overlay content -->
        <div class="overlay-content">
	        <?php
	        wp_nav_menu(
		        array(
			        'menu'              => 'Primary',
			        'theme_location'    => 'Primary Menu',
			        'depth'             => 2,
			        'container'         => 'div',
			        'container_class'   => '',
			        'container_id'      => 'bs-header-navbar-nodesktop',
			        'menu_class'        => 'nav',
			        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			        'walker'            => new WP_Bootstrap_Navwalker()
		        )
	        );
	        ?>
        </div>

    </div>
