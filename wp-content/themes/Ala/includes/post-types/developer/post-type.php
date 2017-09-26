<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:50 PM
 */

	function create_post_type_developer() {
		register_post_type( 'developer',
			array(
				'labels' => array(
					'name'          => __( 'Developer' ),
					'singular_name' => __( 'Developer' ),
					'add_new'       => __( 'Add a New Developer Section' ),
					'edit_item'     => __( 'Edit Developer Section' ),
					'new_item'      => __( 'New Developer Section' ),
					'view_item'     => __( 'View Developer Section' ),
					'view_items'    => __( 'View Developer Sections' ),
					'all_items'     => __( 'Developer Sections' )
				),
				'public' => true
			)
		);
	}