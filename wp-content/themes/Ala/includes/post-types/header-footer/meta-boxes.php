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

    // Site Logo
    $cmb_header->add_field(
      array(
        'name'         => __( 'Logo' ),
        'desc'         => __( 'Logo to display in header section.' ),
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

    // Initiate the metabox for Contact US section
    $cmb_contact = new_cmb2_box(
      array(
        'id'            => 'Contact Us Information',
        'title'         => __( 'Contact Us Information Setup' ),
        'object_types'  => 'header_footer', // Post type
        'context'       => 'normal',
        'priority'      => 'high'
      )
    );

    // Contact us Background Image
    $cmb_contact->add_field(
      array(
        'name'         => __( 'Background image' ),
        'desc'         => __( 'Image to display in Contact us form section.' ),
        'id'           => $prefix . 'contact',
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

    // Contact us Info Background Image
    $cmb_contact->add_field(
      array(
        'name'         => __( 'Background image' ),
        'desc'         => __( 'Image to display in Contact us section.' ),
        'id'           => $prefix . 'contact-swiper',
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

    // Initiate the metabox for social media
    $cmb_sm = new_cmb2_box(
      array(
        'id'            => 'Social Media Information',
        'title'         => __( 'Social Media Information Setup' ),
        'object_types'  => 'header_footer',
        'context'       => 'normal',
        'priority'      => 'high'
      )
    );

    // Facebook uri
    $cmb_sm->add_field(
      array(
        'name'       => __( 'Facebook URL' ),
        'id'         => $prefix . 'fb_uri',
        'type'       => 'text',
        'repeatable' => false
      )
    );

    // Twitter uri
    $cmb_sm->add_field(
      array(
        'name'       => __( 'Twitter URL' ),
        'id'         => $prefix . 'tw_uri',
        'type'       => 'text',
        'repeatable' => false
      )
    );

    // Linkedin uri
    $cmb_sm->add_field(
      array(
        'name'       => __( 'LinkedIn URL' ),
        'id'         => $prefix . 'in_uri',
        'type'       => 'text',
        'repeatable' => false
      )
    );

    // Youtube uri
    $cmb_sm->add_field(
      array(
        'name'       => __( 'Youtube URL' ),
        'id'         => $prefix . 'yb_uri',
        'type'       => 'text',
        'repeatable' => false
      )
    );

    // Instagram uri
    $cmb_sm->add_field(
      array(
        'name'       => __( 'Instagram URL' ),
        'id'         => $prefix . 'ig_uri',
        'type'       => 'text',
        'repeatable' => false
      )
    );


	}