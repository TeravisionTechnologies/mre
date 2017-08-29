<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:51 PM
 */

	function developer_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_dev_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'dev_boxes',
				'title'         => __( 'Information and Images' ),
				'object_types'  => 'developer', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

		// Building Name
		$cmb->add_field(
			array(
				'name'       => __( 'Building Name' ),
				'desc'       => __( 'Name of the current Building' ),
				'id'         => $prefix . 'name',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Build Date
		$cmb->add_field(
			array(
				'name'       => __( 'Build Date' ),
				'desc'       => __( 'Date of build for this property' ),
				'id'         => $prefix . 'date',
				'type'       => 'text_date',
				'repeatable' => false
			)
		);

		// Building Images
		$cmb->add_field(
			array(
				'name'         => __( 'Building Images' ),
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

		// Building Description
		$cmb->add_field(
			array(
				'name'       => __( 'General Description' ),
				'id'         => $prefix . 'desc',
				'type'       => 'textarea_small',
				'repeatable' => false
			)
		);

		// TANGIBLE Interior Details
		$cmb->add_field(
			array(
				'name'       => __( 'TANGIBLE' ),
				'id'         => $prefix . 'TANGIBLE1',
				'type'       => 'text',
				'repeatable' => false
			)
		);

		// Amenities
		$cmb->add_field(
			array(
				'name'       => __( 'Amenities' ),
				'id'         => $prefix . 'amen',
				'type'       => 'textarea_small',
				'repeatable' => false
			)
		);

		// Blueprints
		$cmb->add_field(
			array(
				'name'         => __( 'Blueprints' ),
				'id'           => $prefix . 'blueprints',
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

		// TANGIBLE Nearby Places
		$cmb->add_field(
			array(
				'name'       => __( 'TANGIBLE' ),
				'id'         => $prefix . 'TANGIBLE2',
				'type'       => 'text',
				'repeatable' => false
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
				'desc'       => __( 'Building with this checked will appear first' ),
				'type'       => 'checkbox',
				'repeatable' => false
			)
		);

	}