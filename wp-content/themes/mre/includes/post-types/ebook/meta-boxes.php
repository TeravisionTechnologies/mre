<?php

function ebook_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_eb_';

	// Initiate the metabox for About Us
	$cmb_ebook = new_cmb2_box(
		array(
			'id'           => 'ebcontent',
			'title'        => __( 'Ebook' ),
			'object_types' => 'ebook', // Post type
			'context'      => 'normal',
			'priority'     => 'high'
		)
	);

	// Ebook Time period
	$cmb_date = $cmb_ebook->add_field( array(
		'name' => __( 'Ebook period' ),
		'id'   => $prefix . 'ebook_period',
		'type' => 'text',
		'desc' => 'Example: January - March',
	) );

	// Ebook File
	$cmb_file = $cmb_ebook->add_field( array(
			'name'       => __( 'Ebook PDF file' ),
			'id'         => $prefix . 'ebook_file',
			'type'       => 'file',
			'text'       =>
				array(
					'add_upload_files_text' => __( 'Add or Upload a File' ),
					'file_text'             => __( 'File:' ),
				),
			'options'    =>
				array(
					'url' => false,
				),
			'repeatable' => false
		)
	);

}