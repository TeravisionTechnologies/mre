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

		// Nearby Places
		$cmb->add_field(
			array(
				'name'         => __( 'Nearby Places' ),
				'id'           => $prefix . 'nearby',
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