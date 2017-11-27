<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:18 PM
 */

function services_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_sv_';

	// Initiate the metabox for About Us
	$cmb_about = new_cmb2_box(
		array(
			'id'           => 'Services Information',
			'title'        => __( 'Services Setup' ),
			'object_types' => 'services', // Post type
			'context'      => 'normal',
			'priority'     => 'high'
		)
	);

	// Hero
	$cmb_hero = $cmb_about->add_field( array(
		'id'         => $prefix . 'hero',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Hero Section', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Hero Background
	$cmb_about->add_group_field( $cmb_hero, array(
			'name'         => __( 'Hero Background' ),
			'id'           => $prefix . 'hero_background',
			'type'         => 'file',
			'preview_size' => array( 100, 100 ),
			'text'         =>
				array(
					'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
					'file_text'             => __( 'Image:' ), // default: "File:"
				),
			'options'      =>
				array(
					'url' => false, // Hide the text input for the url
				),
			'repeatable'   => false
		)
	);

	// Hero Text
	$cmb_about->add_group_field( $cmb_hero, array(
		'name' => __( 'Hero Section Text' ),
		'id'   => $prefix . 'hero_text',
		'type' => 'wysiwyg',
	) );

	// Main Section
	$cmb_main = $cmb_about->add_field( array(
		'id'         => $prefix . 'main',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Main Section', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Main Text
	$cmb_about->add_group_field( $cmb_main, array(
		'name' => __( 'Main Text' ),
		'id'   => $prefix . 'main_text',
		'type' => 'wysiwyg',
	) );

	// Services Text
	$cmb_about->add_group_field( $cmb_main, array(
		'name' => __( 'Services Text' ),
		'id'   => $prefix . 'services_text',
		'type' => 'wysiwyg',
	) );

	// Other Services
	$cmb_values = $cmb_about->add_field( array(
		'id'         => $prefix . 'services',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'Service', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Other Service Title
	$cmb_about->add_group_field( $cmb_values, array(
		'name' => __( 'Service Title' ),
		'id'   => $prefix . 'serv_title',
		'type' => 'text',
	) );

	// Other Service Image
	$cmb_about->add_group_field( $cmb_values, array(
			'name'         => __( 'Service Image' ),
			'id'           => $prefix . 'serv_image',
			'type'         => 'file',
			'preview_size' => array( 100, 100 ),
			'text'         =>
				array(
					'add_upload_files_text' => __( 'Add or Upload Images' ),
					'file_text'             => __( 'Image:' ),
				),
			'options'      =>
				array(
					'url' => false,
				),
			'repeatable'   => false
		)
	);

}