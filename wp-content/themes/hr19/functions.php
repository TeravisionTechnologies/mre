<?php

/****** THEME SUPPORTS ******/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
remove_post_type_support( 'post', 'comments' );
remove_post_type_support( 'page', 'comments' );

load_theme_textdomain( 'hr', get_template_directory() . '/languages' );

// Register custom navigation walker
require_once( 'wp_bootstrap_navwalker.php' );

register_nav_menus( array(
	'primary'    => __( 'Primary Menu', 'hr19' ),
	'extra-menu' => __( 'Extra Menu' )
) );

// Login customization
add_action( 'login_head', 'custom_login_logo' );

function custom_login_logo() {
	echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo( 'template_directory' ) . '/assets/hr19.svg) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        #wp-submit{
            background: #ffffff !important;
            border: solid 2px #033c5a !important;
            color: #033c5a;
            -webkit-box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            text-shadow: none !important;
            border-radius: 0 !important;
            font-weight:bold;
        }
        a { 
            background-image:none !important; color: #fff !important;
        }
        #nav, #backtoblog{font-size: 11px!important;text-align: center;color: #033c5a!important;}
        .login form{ -webkit-border-radius: 5px; background-color: rgba(255,255,255,0.4);-webkit-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4); }
        .login label, .login form .forgetmenot label{ color:#555!important;font-weight:bold;font-size: 12px; }
        .postbox{ display:none!important; }
        #nav a{ color:#033c5a!important;font-weight:bold; }
        #backtoblog a{ color:#033c5a!important;font-weight:bold; }
    </style>';
}

// Admin footer customization
function remove_footer_admin() {
	echo '<span id="footer-thankyou">Desarrollado para HR19</span>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );

add_theme_support( 'menus' );

// Directories that contain post-types
$postTypeDir = array(
	__DIR__ . '/includes/post-types/header-footer/',
	__DIR__ . '/includes/post-types/agent/',
	__DIR__ . '/includes/post-types/property/',
  __DIR__ . '/includes/post-types/about-us/',
);

// File names inside post-types dirs
$files = array(
	'meta-boxes.php',
	'post-type.php',
	'taxonomy.php'
);

foreach ( $postTypeDir as $directory ) {
	foreach ( $files as $file ) {
		if ( file_exists( $directory . $file ) ) {
			require_once( $directory . $file );
		}
	}
}

/**
 * ┌───────────────────┐
 * │ Custom Post Types │
 * └───────────────────┘
 */

add_action( 'init', 'call_create_post_types' );

function call_create_post_types() {
	// Post Type for General Settings
	create_post_type_header_footer();
	// Post Type for Agents
	create_post_type_agent();
	// Post Type for Property
  create_post_type_property();
  // Post Type for About Us
  create_post_type_about_us();
}

/* Remove text area field from header and footer */
function remove_page_editor() {
	remove_post_type_support( 'header_footer', 'editor' );
  remove_post_type_support( 'banner', 'editor' );
  remove_post_type_support( 'about_us', 'editor' );
}

add_action( 'init', 'remove_page_editor' );


/**
 * ┌───────────────────┐
 * │ Custom Meta Boxes │
 * └───────────────────┘
 */

add_action( 'cmb2_admin_init', 'call_metaboxes' );

function call_metaboxes() {
	// Metaboxes for General Settings
	header_footer_metaboxes();
	// Metaboxes for Agents
	agent_metaboxes();
	// Metaboxes for Properties
	property_metaboxes();
  // Metaboxes for About Us
  about_us_metaboxes();
}

//SVG Hook
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );


// Begin RETS

date_default_timezone_set( 'America/New_York' );

require_once( "vendor/autoload.php" );

$config = new \PHRETS\Configuration;
$config->setLoginUrl( 'http://rets.sef.mlsmatrix.com/Rets/Login.ashx' )
       ->setUsername( 'lesAERfue' )
       ->setPassword( '8050' )
       ->setRetsVersion( '1.7.2' );

$rets = new \PHRETS\Session( $config );

$connect = $rets->Login();

if ( $connect ) {
	$results = $rets->Search(
		'Property',
		'Listing',
		' (Status = A)',
		[
			'Format' => 'COMPACT-DECODED',
			'Limit'  => 10,
		]
	);
} else {
	$error = $rets->Error();
	print_r( $error );
}

foreach ( $results as $property ) {

	$propid = get_page_by_title( $property['MLSNumber'], 'OBJECT', 'property' ); //Check if already exists

	if ( !$propid ) {
		$post_args       = array(
			'post_title'   => $property['MLSNumber'],
			'post_content' => $property['Remarks'],
			'post_status'  => 'publish',
			'post_type'    => 'property',
			'meta_input'   => array(
				'_pr_address' => $property['AddressInternetDisplay'],
				'_pr_state' => $property['StateOrProvince'],
				'_pr_city' => $property['City'],
				'_pr_community' => $property['CountyOrParish'],
				'_pr_subdiv' => $property['SubdivisionName'],
				'_pr_current_price'    => number_format( round( $property['CurrentPrice'] ) ),
				'_pr_type_of_property' => $property['TypeofProperty'],
				'_pr_room_count' => number_format( round( $property['RoomCount'] ) ),
				'_pr_baths_total' => number_format( round( $property['BathsTotal'] ) ),
				'_pr_baths_full' => number_format( round( $property['BathsFull'] ) ),
				'_pr_baths_half' => number_format( round( $property['BathsHalf'] ) ),
				'_pr_sqft' => number_format( round( $property['SqFtTotal'] ) ),
				'_pr_surf' => number_format( round( $property['TotalAcreage'] ) ),
				'_pr_hoa' => number_format( round( $property['AssociationFee'] ) ),
				'_pr_yearbuilt' => number_format( round( $property['YearBuilt'] ) ),
			)
		);
		$posted_property = wp_insert_post( $post_args );
	} else {
		$post_args       = array(
			'ID'           => $propid->ID,
			'post_title'   => $property['MLSNumber'],
			'post_content' => $property['Remarks'],
			'post_status'  => 'publish',
			'post_type'    => 'property',
			'meta_input'   => array(
				'_pr_address' => $property['AddressInternetDisplay'],
				'_pr_state' => $property['StateOrProvince'],
				'_pr_city' => $property['City'],
				'_pr_community' => $property['CountyOrParish'],
				'_pr_subdiv' => $property['SubdivisionName'],
				'_pr_current_price'    => number_format( round( $property['CurrentPrice'] ) ),
				'_pr_type_of_property' => $property['TypeofProperty'],
				'_pr_room_count' => number_format( round( $property['RoomCount'] ) ),
				'_pr_baths_total' => number_format( round( $property['BathsTotal'] ) ),
				'_pr_baths_full' => number_format( round( $property['BathsFull'] ) ),
				'_pr_baths_half' => number_format( round( $property['BathsHalf'] ) ),
				'_pr_sqft' => number_format( round( $property['SqFtTotal'] ) ),
				'_pr_surf' => number_format( round( $property['TotalAcreage'] ) ),
				'_pr_hoa' => number_format( round( $property['AssociationFee'] ) ),
				'_pr_yearbuilt' => number_format( round( $property['YearBuilt'] ) ),
			)
		);
		$posted_property = wp_update_post( $post_args );
	}

}
