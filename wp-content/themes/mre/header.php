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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="https://use.fontawesome.com/70f3ac0a74.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>

    <?php wp_enqueue_script("jquery"); ?>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
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
                            'container_class'   => 'visible-desktop',
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
    </header>

    <!-- Overlay Menu (tablet and mobile) -->
    <div id="overlay-nav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

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
