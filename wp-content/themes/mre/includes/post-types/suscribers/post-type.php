<?php 

// Register Custom Post Type
function create_post_type_suscribers() {

	$labels = array(
		'name'                  => _x( 'Suscribers', 'Post Type General Name', 'mre' ),
		'singular_name'         => _x( 'Suscriber', 'Post Type Singular Name', 'mre' ),
		'menu_name'             => __( 'Suscribers', 'mre' ),
		'name_admin_bar'        => __( 'Suscribers', 'mre' ),
	);
	$args = array(
		'label'                 => __( 'Suscriber', 'mre' ),
		'description'           => __( 'Post Type Description', 'mre' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'suscriber', $args );

}
add_action( 'init', 'create_post_type_suscribers', 0 );