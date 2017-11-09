<?php
	function create_post_type_about_us() {
		register_post_type( 'about_us',
			array(
				'labels' => array(
					'name'          => __( 'About Us' ),
					'singular_name' => __( 'About Us' ),
					'add_new'       => __( 'Add a About Us' ),
					'edit_item'     => __( 'Edit About Us' ),
					'new_item'      => __( 'New About Us' ),
					'view_item'     => __( 'View About Us' ),
					'view_items'    => __( 'View About Us' ),
					'all_items'     => __( 'About Us' )
				),
				'public' => true
			)
		);
	}