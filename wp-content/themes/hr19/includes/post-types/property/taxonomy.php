<?php

// Register Custom Taxonomy
function create_taxonomy_type() {

	$labels = array(
		'name'          => _x( 'Types', 'Taxonomy General Name', 'hr' ),
		'singular_name' => _x( 'Type', 'Taxonomy Singular Name', 'hr' ),
		'menu_name'     => __( 'Property Types', 'hr' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'property_type', array( 'property' ), $args );

}

add_action( 'init', 'create_taxonomy_type', 0 );