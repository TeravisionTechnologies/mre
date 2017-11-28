<?php

// Register Custom Taxonomy
function create_taxonomy_year() {

	$labels = array(
		'name'                       => _x( 'Dates', 'Taxonomy General Name', 'mre' ),
		'singular_name'              => _x( 'Date', 'Taxonomy Singular Name', 'mre' ),
		'menu_name'                  => __( 'Dates', 'mre' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'years', array( 'ebook' ), $args );

}
add_action( 'init', 'create_taxonomy_year', 0 );