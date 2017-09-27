<?php

	function create_post_type_broker() {
		register_post_type( 'broker',
			array(
				'labels' => array(
					'name'          => __( 'Properties' ),
					'singular_name' => __( 'Property' ),
					'add_new'       => __( 'Add a New Property' ),
					'edit_item'     => __( 'Edit Property' ),
					'new_item'      => __( 'New Property' ),
					'view_item'     => __( 'View Property' ),
					'view_items'    => __( 'View Properties' ),
					'all_items'     => __( 'Properties' )
				),
				'public' => true
			)
		);
	}