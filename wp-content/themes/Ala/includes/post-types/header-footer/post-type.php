<?php

	function create_post_type_header_footer() {
		register_post_type( 'header_footer',
			array(
				'labels' => array(
					'name'          => __( 'Ala19 General Settings' ),
					'singular_name' => __( 'Ala19 General Settings' ),
					'add_new'       => __( 'Add a New Ala19 General Settings' ),
					'edit_item'     => __( 'Edit Ala19 General Settings' ),
					'new_item'      => __( 'New Ala19 General Settings' ),
					'view_item'     => __( 'View Ala19 General Settings' ),
					'view_items'    => __( 'View Ala19 General Settings' ),
					'all_items'     => __( 'Ala19 General Settings' )
				),
				'public' => true
			)
		);
	}