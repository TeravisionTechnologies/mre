<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:06 PM
 */

	function create_post_type_header_footer() {
		register_post_type( 'header_footer',
			array(
				'labels' => array(
					'name'          => __( 'Header & Footer Area' ),
					'singular_name' => __( 'Header & Footer Area' ),
					'add_new'       => __( 'Add a New Header & Footer Area' ),
					'edit_item'     => __( 'Edit Header & Footer Area' ),
					'new_item'      => __( 'New Header & Footer Area' ),
					'view_item'     => __( 'View Header & Footer Area' ),
					'view_items'    => __( 'View Header & Footer Area' ),
					'all_items'     => __( 'Header & Footer Area' )
				),
				'public' => true
			)
		);
	}