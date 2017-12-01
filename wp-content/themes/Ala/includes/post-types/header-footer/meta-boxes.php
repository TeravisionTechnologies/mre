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

    // Initiate the metabox for Partners section
    $cmb_partners = new_cmb2_box(
      array(
        'id'            => 'Partners Information',
        'title'         => __( 'Partners Information Setup' ),
        'object_types'  => 'header_footer', // Post type
        'context'       => 'normal',
        'priority'      => 'high'
      )
    );

    // Partners Text
    $cmb_partners->add_field(
      array(
      'name'    => __( 'Partners Section Text' ),
      'id'      => $prefix . 'partners_text',
      'type'    => 'wysiwyg',
    ) );

    // Partners Images
    $cmb_partners->add_field(
      array(
        'name'         => __( 'Partners images' ),
        'desc'         => __( 'Image to display in Partners section.' ),
        'id'           => $prefix . 'partners-one',
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
    $cmb_partners->add_field(
      array(
      'name'    => __( 'First Partner Link' , 'cmb2' ),
      'id'      => $prefix . 'partner_link_left',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $cmb_partners->add_field(
      array(
        'name'         => __( 'Partners images' ),
        'desc'         => __( 'Image to display in Partners section.' ),
        'id'           => $prefix . 'partners-two',
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
    $cmb_partners->add_field(
      array(
      'name'    => __( 'Second Partner Link' , 'cmb2' ),
      'id'      => $prefix . 'partner_link_right',
      'type' => 'text_url',
      'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    // Our offices Section
    $our_offices = $cmb_header->add_field( array(
      'id'          => $prefix . 'our_offices',
      'type'        => 'group',
      'repeatable'  => false,
      'options'     => array(
        'group_title'   => __( 'Our Offices Section', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Our offices Background
    $cmb_header->add_group_field( $our_offices, array(
        'name'         => __( 'Background' ),
        'id'           => $prefix . 'our_offices_background',
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

    // Our offices Text
    $cmb_header->add_group_field( $our_offices, array(
      'name'    => __( 'Text' ),
      'id'      => $prefix . 'our_offices_text',
      'type'    => 'wysiwyg',
      'options' => array(),
    ) );


    // Offices United States
    $offices_us = $cmb_header->add_field( array(
      'id'          => $prefix . 'offices_us',
      'type'        => 'group',
      'repeatable'  => true,
      'options'     => array(
        'group_title'   => __( 'Offices United States', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Offices United States City
    $cmb_header->add_group_field( $offices_us, array(
      'name'    => __( 'City' ),
      'id'      => $prefix . 'offices_us_city',
      'type'    => 'text',
    ) );

    // Offices United States Address
    $cmb_header->add_group_field( $offices_us, array(
      'name'    => __( 'Address' ),
      'id'      => $prefix . 'offices_us_address',
      'type'    => 'text',
    ) );

    // Offices United States Phone Number
    $cmb_header->add_group_field( $offices_us, array(
      'name'    => __( 'Phone Number' ),
      'id'      => $prefix . 'offices_us_phone',
      'type'    => 'text',
    ) );

    // Offices Spain
    $offices_es = $cmb_header->add_field( array(
      'id'          => $prefix . 'offices_es',
      'type'        => 'group',
      'repeatable'  => true,
      'options'     => array(
        'group_title'   => __( 'Offices Spain', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );

    // Offices Spain City
    $cmb_header->add_group_field( $offices_es, array(
      'name'    => __( 'City' ),
      'id'      => $prefix . 'offices_es_city',
      'type'    => 'text',
    ) );

    // Offices Spain Address
    $cmb_header->add_group_field( $offices_es, array(
      'name'    => __( 'Address' ),
      'id'      => $prefix . 'offices_es_address',
      'type'    => 'text',
    ) );

    // Offices Spain Phone Number
    $cmb_header->add_group_field( $offices_es, array(
      'name'    => __( 'Phone Number' ),
      'id'      => $prefix . 'offices_es_phone',
      'type'    => 'text',
    ) );

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

		// Site Logo
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

		// 404 Page Background
		$cmb->add_field(
			array(
				'name'         => __( '404 Background' ),
				'id'           => $prefix . 'nfbg',
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

	}