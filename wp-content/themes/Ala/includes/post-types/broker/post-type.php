<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:52 PM
 */

	function create_post_type_broker() {
		register_post_type( 'broker',
			array(
				'labels' => array(
					'name'          => __( 'Broker' ),
					'singular_name' => __( 'Broker' ),
					'add_new'       => __( 'Add a New Broker Section' ),
					'edit_item'     => __( 'Edit Broker Section' ),
					'new_item'      => __( 'New Broker Section' ),
					'view_item'     => __( 'View Broker Section' ),
					'view_items'    => __( 'View Broker Sections' ),
					'all_items'     => __( 'Broker Sections' )
				),
				'public' => true
			)
		);
	}