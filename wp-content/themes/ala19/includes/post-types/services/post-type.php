<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:07 PM
 */

	function create_post_type_services() {
		register_post_type( 'services',
			array(
				'labels' => array(
					'name'          => __( 'Services' ),
					'singular_name' => __( 'Service' ),
					'add_new'       => __( 'Add a New Service Section' ),
					'edit_item'     => __( 'Edit Service Section' ),
					'new_item'      => __( 'New Service Section' ),
					'view_item'     => __( 'View Service Section' ),
					'view_items'    => __( 'View Service Sections' ),
					'all_items'     => __( 'Service Sections' )
				),
				'public' => true
			)
		);
	}