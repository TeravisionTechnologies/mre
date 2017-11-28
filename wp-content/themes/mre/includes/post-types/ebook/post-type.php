<?php 

// Register Custom Post Type
function create_post_type_ebook() {

	$labels = array(
		'name'                  => _x( 'Ebooks', 'Post Type General Name', 'mre' ),
		'singular_name'         => _x( 'Ebook', 'Post Type Singular Name', 'mre' ),
		'menu_name'             => __( 'Ebooks', 'mre' ),
		'name_admin_bar'        => __( 'Ebooks', 'mre' ),
	);
	$args = array(
		'label'                 => __( 'Ebook', 'mre' ),
		'description'           => __( 'Post Type Description', 'mre' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'menu_icon'				=> 'dashicons-book',
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ebook', $args );

}
add_action( 'init', 'create_post_type_ebook', 0 );