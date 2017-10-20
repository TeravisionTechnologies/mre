<?php
    // Loads css file
    wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );

    load_theme_textdomain('hr', get_template_directory() . '/languages');

    // Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hr19' ),
        'extra-menu' => __( 'Extra Menu' )
    ) );

    add_theme_support( 'menus' );