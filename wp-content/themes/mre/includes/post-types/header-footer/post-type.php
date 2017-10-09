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
					'name'          => __( 'Header, Footer & Homepage Area' ),
					'singular_name' => __( 'Header, Footer & Homepage Area' ),
					'add_new'       => __( 'Add a New Header, Footer & Homepage Area' ),
					'edit_item'     => __( 'Edit Header, Footer & Homepage' ),
					'new_item'      => __( 'New Header, Footer & Homepage' ),
					'view_item'     => __( 'View Header, Footer & Homepage' ),
					'view_items'    => __( 'View Header, Footer & Homepage' ),
					'all_items'     => __( 'Header, Footer & Homepage' )
				),
				'public' => true
			)
		);
	}