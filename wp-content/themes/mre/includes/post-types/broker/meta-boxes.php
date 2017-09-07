<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:51 PM
 */

	function broker_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_br_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'broker_boxes',
				'title'         => __( 'Information and Images' ),
				'object_types'  => 'broker', // Post type
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