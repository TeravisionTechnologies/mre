<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:20 PM
 */

	function create_post_type_blog() {
		register_post_type( 'blog',
			array(
				'labels' => array(
					'name'          => __( 'Blog' ),
					'singular_name' => __( 'Blog' ),
					'add_new'       => __( 'Add a New Blog Section' ),
					'edit_item'     => __( 'Edit Blog Section' ),
					'new_item'      => __( 'New Blog Section' ),
					'view_item'     => __( 'View Blog Section' ),
					'view_items'    => __( 'View Blog Sections' ),
					'all_items'     => __( 'Blog' )
				),
				'public' => true
			)
		);
	}