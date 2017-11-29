<?php

function header_footer_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_hf_';

	// Initiate the metabox
	$cmb = new_cmb2_box(
		array(
			'id'           => 'header_footer_boxes',
			'title'        => __( 'Header, Homepage and Footer editable items' ),
			'object_types' => 'header_footer', // Post type
			'context'      => 'normal',
			'priority'     => 'high'
		)
	);

	// Header Logo
	$cmb->add_field(
		array(
			'name'         => __( 'Header Logo' ),
			'id'           => $prefix . 'logo',
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

	// Social Networks
	$social_networks = $cmb->add_field( array(
		'id'         => $prefix . 'social_networks',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Social Networks', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Linkedin Link
	$cmb->add_group_field( $social_networks, array(
		'name'      => __( 'Linkedin', 'cmb2' ),
		'id'        => $prefix . 'linkedin',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Facebook Link
	$cmb->add_group_field( $social_networks, array(
		'name'      => __( 'Facebook', 'cmb2' ),
		'id'        => $prefix . 'facebook',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Instagram Link
	$cmb->add_group_field( $social_networks, array(
		'name'      => __( 'Instagram', 'cmb2' ),
		'id'        => $prefix . 'instagram',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Twitter Link
	$cmb->add_group_field( $social_networks, array(
		'name'      => __( 'Twitter', 'cmb2' ),
		'id'        => $prefix . 'twitter',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Youtube Link
	$cmb->add_group_field( $social_networks, array(
		'name'      => __( 'Youtube', 'cmb2' ),
		'id'        => $prefix . 'youtube',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Hero Images
	$hero_images = $cmb->add_field( array(
		'id'         => $prefix . 'hero_images',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'Hero Image {#}', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Hero Image
	$cmb->add_group_field( $hero_images, array(
		'name' => __( 'Hero Image' ),
		'id'   => $prefix . 'hero_image',
		'type' => 'file',
	) );

	// Hero Text
	$cmb->add_group_field( $hero_images, array(
		'name' => __( 'Hero Text' ),
		'id'   => $prefix . 'hero_text',
		'type' => 'wysiwyg',
	) );

	// About Us Section
	$about_us = $cmb->add_field( array(
		'id'         => $prefix . 'about_us',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'About Us Section {#}', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// About Us Background
	$cmb->add_group_field( $about_us, array(
		'name' => __( 'Background' ),
		'id'   => $prefix . 'about_us_background',
		'type' => 'file',
	) );

	// About Us Image
	$cmb->add_group_field( $about_us, array(
		'name' => __( 'Image' ),
		'id'   => $prefix . 'about_us_image',
		'type' => 'file',
	) );

	// About Us Text
	$cmb->add_group_field( $about_us, array(
		'name' => __( 'Text' ),
		'id'   => $prefix . 'about_us_text',
		'type' => 'wysiwyg',
	) );

	// About Us Numbers
	$about_numbers = $cmb->add_field( array(
		'id'         => $prefix . 'about_numbers',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'About Us Numbers Section {#}', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// About Us Number Digits
	$cmb->add_group_field( $about_numbers, array(
		'name' => __( 'Numbers' ),
		'id'   => $prefix . 'about_numbers_digits',
		'type' => 'text',
	) );

	// About Us Number Digits
	$cmb->add_group_field( $about_numbers, array(
		'name' => __( 'Text' ),
		'id'   => $prefix . 'about_numbers_text',
		'type' => 'text',
	) );

	// Partner Left Section
	$partner_left = $cmb->add_field( array(
		'id'         => $prefix . 'partner_left',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Partner Section Left', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Partners Left Background
	$cmb->add_group_field( $partner_left, array(
			'name'         => __( 'Partner Left Background' ),
			'id'           => $prefix . 'partner_left_background',
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

	// Partners Left Logo
	$cmb->add_group_field( $partner_left, array(
			'name'         => __( 'Partner Left Logo' ),
			'id'           => $prefix . 'partner_left_logo',
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

	// Partners Left Title
	$cmb->add_group_field( $partner_left, array(
		'name'    => __( 'Partner Left Title' ),
		'id'      => $prefix . 'partner_left_title',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );

	// First Partner link
	$cmb->add_group_field( $partner_left, array(
		'name'      => __( 'First Partner Link', 'cmb2' ),
		'id'        => $prefix . 'partner_link_left',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Partner Right Section
	$partner_right = $cmb->add_field( array(
		'id'         => $prefix . 'partner_right',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Partner Section Right', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Partners Right Background
	$cmb->add_group_field( $partner_right, array(
			'name'         => __( 'Partner Right Background' ),
			'id'           => $prefix . 'partner_right_background',
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

	// Partners Left Logo
	$cmb->add_group_field( $partner_right, array(
			'name'         => __( 'Partner Right Logo' ),
			'id'           => $prefix . 'partner_right_logo',
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

	// Partners Right Title
	$cmb->add_group_field( $partner_right, array(
		'name'    => __( 'Partner Right Title' ),
		'id'      => $prefix . 'partner_right_title',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );

	// Second Partner link
	$cmb->add_group_field( $partner_right, array(
		'name'      => __( 'Second Partner Link', 'cmb2' ),
		'id'        => $prefix . 'partner_link_right',
		'type'      => 'text_url',
		'protocols' => array(
			'http',
			'https',
			'ftp',
			'ftps',
			'mailto',
			'news',
			'irc',
			'gopher',
			'nntp',
			'feed',
			'telnet'
		), // Array of allowed protocols
	) );

	// Our offices Section
	$our_offices = $cmb->add_field( array(
		'id'         => $prefix . 'our_offices',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Our Offices Section', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Our offices Background
	$cmb->add_group_field( $our_offices, array(
			'name'         => __( 'Background' ),
			'id'           => $prefix . 'our_offices_background',
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

	// Our offices Text
	$cmb->add_group_field( $our_offices, array(
		'name'    => __( 'Text' ),
		'id'      => $prefix . 'our_offices_text',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );

	// Offices Venezuela
	$offices_ve = $cmb->add_field( array(
		'id'         => $prefix . 'offices_ve',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'Offices Venezuela', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Offices Venezuela City
	$cmb->add_group_field( $offices_ve, array(
		'name' => __( 'City' ),
		'id'   => $prefix . 'offices_ve_city',
		'type' => 'text',
	) );

	// Offices Venezuela Address
	$cmb->add_group_field( $offices_ve, array(
		'name' => __( 'Address' ),
		'id'   => $prefix . 'offices_ve_address',
		'type' => 'text',
	) );

	// Offices Venezuela Phone Number
	$cmb->add_group_field( $offices_ve, array(
		'name' => __( 'Phone Number' ),
		'id'   => $prefix . 'offices_ve_phone',
		'type' => 'text',
	) );

	// Offices United States
	$offices_us = $cmb->add_field( array(
		'id'         => $prefix . 'offices_us',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'Offices United States', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Offices United States City
	$cmb->add_group_field( $offices_us, array(
		'name' => __( 'City' ),
		'id'   => $prefix . 'offices_us_city',
		'type' => 'text',
	) );

	// Offices United States Address
	$cmb->add_group_field( $offices_us, array(
		'name' => __( 'Address' ),
		'id'   => $prefix . 'offices_us_address',
		'type' => 'text',
	) );

	// Offices United States Phone Number
	$cmb->add_group_field( $offices_us, array(
		'name' => __( 'Phone Number' ),
		'id'   => $prefix . 'offices_us_phone',
		'type' => 'text',
	) );

	// Offices Spain
	$offices_es = $cmb->add_field( array(
		'id'         => $prefix . 'offices_es',
		'type'       => 'group',
		'repeatable' => true,
		'options'    => array(
			'group_title'   => __( 'Offices Spain', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Offices Spain City
	$cmb->add_group_field( $offices_es, array(
		'name' => __( 'City' ),
		'id'   => $prefix . 'offices_es_city',
		'type' => 'text',
	) );

	// Offices Spain Address
	$cmb->add_group_field( $offices_es, array(
		'name' => __( 'Address' ),
		'id'   => $prefix . 'offices_es_address',
		'type' => 'text',
	) );

	// Offices Spain Phone Number
	$cmb->add_group_field( $offices_es, array(
		'name' => __( 'Phone Number' ),
		'id'   => $prefix . 'offices_es_phone',
		'type' => 'text',
	) );

	// Contact Form Section
	$contact_form = $cmb->add_field( array(
		'id'         => $prefix . 'contact_form',
		'type'       => 'group',
		'repeatable' => false,
		'options'    => array(
			'group_title'   => __( 'Contact Form Section', 'cmb2' ),
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true,
		),
	) );

	// Contact Form First Text
	$cmb->add_group_field( $contact_form, array(
		'name' => __( 'First Message' ),
		'id'   => $prefix . 'contact_first',
		'type' => 'text',
	) );

	// Contact Form Second Text
	$cmb->add_group_field( $contact_form, array(
		'name' => __( 'Second Message' ),
		'id'   => $prefix . 'contact_second',
		'type' => 'text',
	) );

	// Contact Form Background
	$cmb->add_group_field( $contact_form, array(
			'name'         => __( 'Contact Form Background' ),
			'id'           => $prefix . 'contact_background',
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

	// Contact Form Phone Section
	$cmb->add_group_field( $contact_form, array(
		'name'    => __( 'Text' ),
		'id'      => $prefix . 'contact_text',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );

	// Contact Form Phone Number
	$cmb->add_group_field( $contact_form, array(
		'name' => __( 'Phone Number' ),
		'id'   => $prefix . 'contact_phone',
		'type' => 'text',
	) );

	// Footer Logo
	$cmb->add_field(
		array(
			'name'         => __( 'Footer Logo' ),
			'id'           => $prefix . 'footer_logo',
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

	// Footer Copyright
	$cmb->add_field(
		array(
			'name'       => __( 'Footer Copyright' ),
			'desc'       => __( 'Copyright to display in the footer' ),
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

