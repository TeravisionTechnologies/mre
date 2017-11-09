<?php

	function about_us_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_au_';

    // Initiate the metabox for About Us
    $cmb_about = new_cmb2_box(
      array(
        'id'            => 'About Us Information',
        'title'         => __( 'About Us Setup' ),
        'object_types'  => 'about_us', // Post type
        'context'       => 'normal',
        'priority'      => 'high'
      )
    );

    // Hero
    $cmb_hero = $cmb_about->add_field( array(
      'id'          => $prefix . 'hero',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
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

    // Hero Text
    $cmb_about->add_group_field( $cmb_hero, array(
      'name'    => __( 'Hero Section Text' ),
      'id'      => $prefix . 'hero_text',
      'type'    => 'wysiwyg',
    ) );

    // Main Section
    $cmb_main = $cmb_about->add_field( array(
      'id'          => $prefix . 'main',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Main Section', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Main Text
    $cmb_about->add_group_field( $cmb_main, array(
      'name'    => __( 'Main Text' ),
      'id'      => $prefix . 'main_text',
      'type'    => 'wysiwyg',
    ) );

    // Vision Text
    $cmb_about->add_group_field( $cmb_main, array(
      'name'    => __( 'Vision Text' ),
      'id'      => $prefix . 'vision_text',
      'type'    => 'wysiwyg',
    ) );

    // Mission Text
    $cmb_about->add_group_field( $cmb_main, array(
      'name'    => __( 'Mission Text' ),
      'id'      => $prefix . 'mission_text',
      'type'    => 'wysiwyg',
    ) );

    // Our Team Text
    $cmb_about->add_group_field( $cmb_main, array(
      'name'    => __( 'Our Team Text' ),
      'id'      => $prefix . 'team_text',
      'type'    => 'wysiwyg',
    ) );

    // Our Properties Text
    $cmb_about->add_group_field( $cmb_main, array(
      'name'    => __( 'Properties Text' ),
      'id'      => $prefix . 'properties_text',
      'type'    => 'wysiwyg',
    ) );

    // Values Section
    $cmb_values = $cmb_about->add_field( array(
      'id'          => $prefix . 'values',
      'type'        => 'group',
      'repeatable'  => true,
      'options'     => array(
        'group_title'   => __( 'Value', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Value Title
    $cmb_about->add_group_field( $cmb_values, array(
      'name'    => __( 'Value Title' ),
      'id'      => $prefix . 'value_title',
      'type'    => 'text',
    ) );

    // Value Title
    $cmb_about->add_group_field( $cmb_values, array(
      'name'    => __( 'Value Text' ),
      'id'      => $prefix . 'value_text',
      'type'    => 'wysiwyg',
    ) );

    // Value Image
    $cmb_about->add_group_field( $cmb_values, array(
        'name'         => __( 'Value Image' ),
        'id'           => $prefix . 'value_image',
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

	}