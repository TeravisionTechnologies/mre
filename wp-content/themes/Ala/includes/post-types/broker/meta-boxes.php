<?php

	function broker_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_br_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'broker_boxes',
				'title'         => __( 'Property Information' ),
				'object_types'  => 'broker',
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);


		// Property Images
		$cmb->add_field(
			array(
				'name'         => __( 'Property Images' ),
				'id'           => $prefix . 'images',
				'type'         => 'file_list',
				'preview_size' => array(100,100),
				'text'         =>
					array(
					'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
					'file_text'             => __( 'Image:' ), // default: "File:"
					),
				'repeatable'   => false
			)
		);

		// Property Price
		$cmb->add_field(
			array(
				'name'       => __( 'Property Price' ),
				'desc'       => __( 'The price of the current property' ),
				'id'         => $prefix . 'price',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Property Address
		$cmb->add_field(
			array(
				'name'       => __( 'Property Address' ),
				'desc'       => __( 'The address of the current property' ),
				'id'         => $prefix . 'address',
				'type'       => 'text',
				'repeatable'      => false
			)
		);

		// Interior Details
		$group_field = $cmb->add_field(
			array(
				'id'          => 'interior_group_field',
				'type'        => 'group',
				'description' => __( 'Image and name of the detail', 'cmb2' ),
				// 'repeatable'  => false, // use false if you want non-repeatable group
				'options'     => array(
					'group_title'   => __( 'Detail {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'cmb2' ),
					'remove_button' => __( 'Remove Entry', 'cmb2' ),
					'sortable'      => true, // beta
					// 'closed'     => true, // true to have the groups closed by default
				)
			)
		);

		// Image
		$cmb->add_group_field( $group_field,
			array(
				'name'         => __( 'Image' ),
				'id'           => $prefix . 'image',
				'type'         => 'file',
				'preview_size' => array(100,100),
				'text'         =>
					array(
						'add_upload_files_text' => __( 'Add or Upload Image' ), // default: "Add or Upload Files"
						'file_text'             => __( 'Image:' ), // default: "File:"
					),
				'options'      => array(
					'url' => false, // Hide the text input for the url
				),
				'repeatable'   => false
			)
		);

		// Name
		$cmb->add_group_field( $group_field,
			array(
				'name'       => __( 'Detail Name' ),
				'desc'       => __( 'Interior detail Name for the image uploaded above' ),
				'id'         => $prefix . 'name',
				'type'       => 'text',
				'repeatable'      => false
			)
		);

		// Amenities
		$cmb->add_field(
			array(
				'name'    => 'Amenities',
				'id'      => $prefix . 'amen',
				'type'    => 'wysiwyg',
				'options' => array(),
			)
		);

		// Type of transaction
		$cmb->add_field(
			array(
				'name'       => __( 'Transaction type' ),
				'desc'       => __( 'Specify if the type of transaction (buy/sell)' ),
				'id'         => $prefix . 'type',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Neighborhood Description
		$cmb->add_field(
			array(
				'name'       => __( 'Neighborhood Description' ),
				'desc'       => __( 'Description of the neighborhood' ),
				'id'         => $prefix . 'neighborhood',
				'type'       => 'text',
				'repeatable'      => false
			)
		);

		// Longitude
		$cmb->add_field(
			array(
				'name'       => __( 'Longitude' ),
				'id'         => $prefix . 'lng',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Latitude
		$cmb->add_field(
			array(
				'name'       => __( 'Latitude' ),
				'id'         => $prefix . 'lat',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Important
		$cmb->add_field(
			array(
				'name'       => __( 'Important' ),
				'id'         => $prefix . 'important',
				'desc'       => __( 'Property with this checked will appear first' ),
				'type'       => 'checkbox',
				'repeatable' => false
			)
		);

	}