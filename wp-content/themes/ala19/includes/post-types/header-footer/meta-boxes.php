<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:07 PM
 */

	function header_footer_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_hf_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'header_footer_boxes',
				'title'         => __( 'Header and/or Footer layout options' ),
				'object_types'  => 'header_footer', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

		// Site Logo
		$cmb->add_field(
			array(
				'name'         => __( 'Site Logo' ),
				'desc'         => __( 'Logo to display in header and footer' ),
				'id'           => $prefix . 'logo',
				'type'         => 'file',
				'preview_size' => array(100,100),
				'text'         =>
					array(
						'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
						'file_text'             => __( 'Image:' ), // default: "File:"
					),
				'options' =>
					array(
						'url' => false, // Hide the text input for the url
					),
				'repeatable'   => false
			)
		);

		// Footer Copyright
		$cmb->add_field(
			array(
				'name'       => __( 'Footer Copyright' ),
				'desc'       => __( 'Copyright to display in the footer' ),
				'id'         => $prefix . 'copy',
				'type'       => 'text',
				'repeatable'      => false
			)
		);


	}