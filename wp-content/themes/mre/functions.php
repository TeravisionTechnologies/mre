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

    register_nav_menus(
    	array(
	        'primary'    => __( 'Primary Menu', 'mre' ),
	        'extra-menu' => __( 'Extra Menu', 'mre'  )
        )
    );

    add_theme_support( 'menus' );

	function mre_enqueue_scripts() {
		wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/basic.js', array(), '1' );
	}

	// Directories that contain post-types
	$postTypeDir = array (
		__DIR__.'/includes/post-types/about-us/',
		__DIR__.'/includes/post-types/broker/',
		__DIR__.'/includes/post-types/developer/',
		__DIR__.'/includes/post-types/header-footer/',
		__DIR__.'/includes/post-types/services/'
	);

	// File names inside post-types dirs
	$files = array (
		'meta-boxes.php',
		'post-type.php'
	);

	foreach ($postTypeDir as $directory) {
		foreach ($files as $file) {
			if ( file_exists( $directory . $file ) ) {
				require_once( $directory . $file );
			}
		}
	}

/**
* ┌───────────────────┐
* │ Custom Post Types │
* └───────────────────┘
*/

	add_action( 'init', 'call_create_post_types' );

	function call_create_post_types() {

		// Post Type for About Us
		create_post_type_about_us();
		// Post Type for Broker
		create_post_type_broker();
		// Post Type for Developer
		create_post_type_developer();
		// Post Type for Header and Footer
		create_post_type_header_footer();
		// Post Type for Services
		create_post_type_services();

	}


/**
 * ┌───────────────────┐
 * │ Custom Meta Boxes │
 * └───────────────────┘
 */

	add_action( 'cmb2_admin_init', 'call_metaboxes' );

	function call_metaboxes() {

		// Metaboxes for About Us
		about_us_metaboxes();
		// Metaboxes for Broker
		broker_metaboxes();
		// Metaboxes for Developer
		developer_metaboxes();
		// Metaboxes for Header and Footer
		header_footer_metaboxes();
		// Metaboxes for Services
		services_metaboxes();

	}