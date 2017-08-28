<?php
    /**
     *  Created by PhpStorm.
     *  User: mtoledo
     *  Date: 3/8/17
     *  Time: 8:19 AM
     **/

    // Loads css or js files
	add_action('wp_enqueue_scripts', 'mre_enqueue_scripts');

    // Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', '8digital' ),
        'extra-menu' => __( 'Extra Menu' )
    ) );

    add_theme_support( 'menus' );

	function mre_enqueue_scripts() {
		wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );
	}