<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:19 PM
 */

	function about_us_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_about_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'about_us_boxes',
				'title'         => __( 'Additional Sections' ),
				'object_types'  => 'about_us', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

		// About Section
		$group_field = $cmb->add_field(
				array(
				'id'          => 'about_group_field',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'cmb2' ),
				// 'repeatable'  => false, // use false if you want non-repeatable group
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
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

		// Description
		$cmb->add_group_field( $group_field,
			array(
				'name'       => __( 'Description' ),
				'desc'       => __( 'Description for the image uploaded above' ),
				'id'         => $prefix . 'desc',
				'type'       => 'textarea',
				'repeatable'      => false
			)
		);

	}