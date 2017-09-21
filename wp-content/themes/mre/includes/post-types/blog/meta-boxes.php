<?php

	function blog_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_blog_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'blog_boxes',
				'title'         => __( 'Additional Sections' ),
				'object_types'  => 'blog', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

		// Partner 1
		$cmb->add_field(
			array(
				'name'         => __( 'Partner 1 Image' ),
				'id'           => $prefix . 'image-1',
				'type'         => 'file',
				'preview_size' => array(100,100),
				'options'      => array(
					'url' => false, // Hide the text input for the url
				),
				'text'         =>
					array(
						'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
						'file_text'             => __( 'Image:' ), // default: "File:"
					),
				'repeatable'   => false
			)
		);

		// Partner 2
		$cmb->add_field(
			array(
				'name'         => __( 'Partner 2 Image' ),
				'id'           => $prefix . 'image-2',
				'type'         => 'file',
				'preview_size' => array(100,100),
				'options'      => array(
					'url' => false, // Hide the text input for the url
				),
				'text'         =>
					array(
						'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
						'file_text'             => __( 'Image:' ), // default: "File:"
					),
				'repeatable'   => false
			)
		);

	}