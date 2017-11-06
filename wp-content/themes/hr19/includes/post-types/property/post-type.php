<?php

// Register Custom Post Type
function create_post_type_property() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'hr' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'hr' ),
		'menu_name'             => __( 'Property', 'hr' ),
		'name_admin_bar'        => __( 'Property', 'hr' ),
	);
	$args   = array(
		'label'               => __( 'Property', 'hr' ),
		'description'         => __( 'Property', 'hr' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'property', $args );

}

add_action( 'init', 'create_post_type_property', 0 );