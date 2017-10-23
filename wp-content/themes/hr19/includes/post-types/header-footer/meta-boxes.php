<?php

	function header_footer_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_hf_';

    // Initiate the metabox for Header
    $cmb_header = new_cmb2_box(
      array(
        'id'            => 'Header Information',
        'title'         => __( 'Header Information Setup' ),
        'object_types'  => 'header_footer', // Post type
        'context'       => 'normal',
        'priority'      => 'high'
      )
    );

    // Header Logo
    $cmb_header->add_field(
      array(
        'name'         => __( 'Header Logo' ),
        'id'           => $prefix . 'header_logo',
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

    // Social Networks
    $social_networks = $cmb_header->add_field( array(
      'id'          => $prefix . 'social_networks',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Social Networks', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Linkedin Link
    $cmb_header->add_group_field( $social_networks, array(
      'name'    => __( 'Linkedin' , 'cmb2' ),
      'id'      => $prefix . 'linkedin',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Facebook Link
    $cmb_header->add_group_field( $social_networks, array(
      'name'    => __( 'Facebook' , 'cmb2' ),
      'id'      => $prefix . 'facebook',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Instagram Link
    $cmb_header->add_group_field( $social_networks, array(
      'name'    => __( 'Instagram' , 'cmb2' ),
      'id'      => $prefix . 'instagram',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Twitter Link
    $cmb_header->add_group_field( $social_networks, array(
      'name'    => __( 'Twitter' , 'cmb2' ),
      'id'      => $prefix . 'twitter',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Youtube Link
    $cmb_header->add_group_field( $social_networks, array(
      'name'    => __( 'Youtube' , 'cmb2' ),
      'id'      => $prefix . 'youtube',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );


    // Hero
    $cmb_hero = $cmb_header->add_field( array(
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

    // Hero Image
    $cmb_header->add_group_field( $cmb_hero, array(
        'name'         => __( 'Background' ),
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
    $cmb_header->add_group_field( $cmb_hero, array(
      'name'    => __( 'Hero Section Text' ),
      'id'      => $prefix . 'hero_text',
      'type'    => 'wysiwyg',
    ) );

    // Initiate the metabox for Partners
    $partners = $cmb_header->add_field( array(
      'id'          => $prefix . 'partners',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Partners Section', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Partners section text
    $cmb_header->add_group_field( $partners, array(
      'name'    => __( 'Text' ),
      'id'      => $prefix . 'partners_text',
      'type'    => 'wysiwyg',
      'options' => array(),
    ) );

    // First partner logo
    $cmb_header->add_group_field( $partners, array(
        'name'         => __( 'First Partner' ),
        'id'           => $prefix . 'partner_logo_left',
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

    // First Partner link
    $cmb_header->add_group_field( $partners, array(
      'name'    => __( 'First Partner Link' , 'cmb2' ),
      'id'      => $prefix . 'partner_link_left',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Second partner logo
    $cmb_header->add_group_field( $partners, array(
        'name'         => __( 'Second Partner' ),
        'id'           => $prefix . 'partner_logo_right',
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

    // Second Partner link
    $cmb_header->add_group_field( $partners, array(
      'name'    => __( 'Second Partner Link' , 'cmb2' ),
      'id'      => $prefix . 'partner_link_right',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Initiate the metabox for Rental One Section
    $rental_one = $cmb_header->add_field( array(
      'id'          => $prefix . 'rental',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Rental One Section', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Rental One logo
    $cmb_header->add_group_field( $rental_one, array(
        'name'         => __( 'Rental One Logo' ),
        'id'           => $prefix . 'rental_logo',
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

    // Rental One Background
    $cmb_header->add_group_field( $rental_one, array(
        'name'         => __( 'Rental One Background' ),
        'id'           => $prefix . 'rental_background',
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

    // Rental One link
    $cmb_header->add_group_field( $rental_one, array(
      'name'    => __( 'Rental One Link' , 'cmb2' ),
      'id'      => $prefix . 'rental_link',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

		// Initiate the metabox for footer
		$cmb = new_cmb2_box(
			array(
				'id'            => 'Footer Information',
				'title'         => __( 'Footer Information Setup' ),
				'object_types'  => 'header_footer', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

    // Contact Form Section
    $contact_form = $cmb_header->add_field( array(
      'id'          => $prefix . 'contact_form',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Contact Form Section', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Contact Form First Text
    $cmb_header->add_group_field( $contact_form, array(
      'name'    => __( 'First Message' ),
      'id'      => $prefix . 'contact_first',
      'type'    => 'text',
    ) );

    // Contact Form Second Text
    $cmb_header->add_group_field( $contact_form, array(
      'name'    => __( 'Second Message' ),
      'id'      => $prefix . 'contact_second',
      'type'    => 'text',
    ) );

    // Contact Form Background
    $cmb_header->add_group_field( $contact_form, array(
        'name'         => __( 'Contact Form Background' ),
        'id'           => $prefix . 'contact_background',
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

    // Contact Form Phone Section
    $cmb_header->add_group_field( $contact_form, array(
      'name'    => __( 'Text' ),
      'id'      => $prefix . 'contact_text',
      'type'    => 'wysiwyg',
      'options' => array(),
    ) );

    // Contact Form Phone Number
    $cmb_header->add_group_field( $contact_form, array(
      'name'    => __( 'Phone Number' ),
      'id'      => $prefix . 'contact_phone',
      'type'    => 'text',
    ) );

		// Footer Logo
		$cmb->add_field(
			array(
				'name'         => __( 'Logo' ),
				'desc'         => __( 'Logo to display in footer section.' ),
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
				'name'       => __( 'Copyright Information' ),
				'id'         => $prefix . 'copy',
				'type'       => 'text',
				'repeatable' => false
			)
		); 
	}