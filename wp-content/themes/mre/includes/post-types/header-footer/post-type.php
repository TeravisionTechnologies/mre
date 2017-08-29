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
					'name'          => __( 'Headers & Footers' ),
					'singular_name' => __( 'Header & Footer' ),
					'add_new'       => __( 'Add a New Header or Footer' ),
					'edit_item'     => __( 'Edit Footer or Header' ),
					'new_item'      => __( 'New Footer or Header' ),
					'view_item'     => __( 'View Header or Footer' ),
					'view_items'    => __( 'View Headers & Footers' ),
					'all_items'     => __( 'Headers & Footers' )
				),
				'public' => true
			)
		);
	}