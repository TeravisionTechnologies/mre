<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:20 PM
 */

	function create_post_type_about_us() {
		register_post_type( 'about_us',
			array(
				'labels' => array(
					'name'          => __( 'About Us' ),
					'singular_name' => __( 'About Us' ),
					'add_new'       => __( 'Add a New About Us Section' ),
					'edit_item'     => __( 'Edit About Us Section' ),
					'new_item'      => __( 'New About Us Section' ),
					'view_item'     => __( 'View About Us Section' ),
					'view_items'    => __( 'View About Us Sections' ),
					'all_items'     => __( 'About Us' )
				),
				'public' => true
			)
		);
	}