<?php
	function create_post_type_header_footer() {
		register_post_type( 'header_footer',
			array(
				'labels' => array(
					'name'          => __( 'HR19 General Settings' ),
					'singular_name' => __( 'HR19 General Settings' ),
					'add_new'       => __( 'Add a New HR19 General Settings' ),
					'edit_item'     => __( 'Edit HR19 General Settings' ),
					'new_item'      => __( 'New HR19 General Settings' ),
					'view_item'     => __( 'View HR19 General Settings' ),
					'view_items'    => __( 'View HR19 General Settings' ),
					'all_items'     => __( 'HR19 General Settings' )
				),
				'public' => true
			)
		);
	}