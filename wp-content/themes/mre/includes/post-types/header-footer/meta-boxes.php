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

		//Hero Image Left Container
    $cmb->add_field(
      array(
        'name'         => __( 'Hero Image Left Container' ),
        'id'           => $prefix . 'hero_image_left',
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

    //Hero Image Right Container
    $cmb->add_field(
      array(
        'name'         => __( 'Hero Image Right Container' ),
        'id'           => $prefix . 'hero_image_right',
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

    //Left Hero Image Text
    $cmb->add_field( array(
      'name'    => 'Left Hero Image Text',
      'id'      => $prefix . 'text_hero_left',
      'type'    => 'wysiwyg',
      'options' => array(),
    ) );

    //Right Hero Image Text
    $cmb->add_field( array(
      'name'    => 'Right Hero Image Text',
      'id'      => $prefix . 'text_hero_right',
      'type'    => 'wysiwyg',
      'options' => array(),
    ) );

    // Left Hero Link
    $cmb->add_field(
      array(
        'name'       => __( 'Left Hero Link' ),
        'id'         => $prefix . 'left_hero_link',
        'type'       => 'text',
        'repeatable'      => false
      )
    );

    // Right Hero Link
    $cmb->add_field(
      array(
        'name'       => __( 'Right Hero Link' ),
        'id'         => $prefix . 'right_hero_link',
        'type'       => 'text',
        'repeatable'      => false
      )
    );
	}