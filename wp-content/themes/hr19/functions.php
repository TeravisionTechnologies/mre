<?php

# THEME SUPPORTS
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
remove_post_type_support( 'post', 'comments' );
remove_post_type_support( 'page', 'comments' );

# LANGUAGE TEXT DOMAIN
load_theme_textdomain( 'hr', get_template_directory() . '/languages' );

# ENQUEUE SCRIPTS AND STYLES
function hr_scripts() {

	#Getting cities, address and postal codes for the suggestion plugin.
	global $wpdb;
	$lang           = get_locale();
	$cities         = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_city' ) );
	$address        = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_address' ) );
	$postalcode     = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_postalcode' ) );
	$jsonaddress    = wp_json_encode( $cities );
	$jsoncities     = wp_json_encode( $address );
	$jsonpostalcode = wp_json_encode( $postalcode );
	if ( $lang == "es_ES" ) {
		$msj        = '<p class="no-results"><span>No pudimos encontrar su búsqueda</span><br>Verifique su ortografía o vuelva a hacer su búsqueda usando una ubicación dentro de los E.E.U.U</p>';
		$acaddress  = "Dirección";
		$accity     = "Ciudad";
		$acpc       = "Código Postal";
		$acrequired = "Introduzca una ubicación o #MLS";
	} else {
		$msj        = '<p class="no-results"><span>We could not find your search</span><br>Verify your spelling or re-search using a location within the US</p>';
		$acaddress  = "Address";
		$accity     = "City";
		$acpc       = "Postal Code";
		$acrequired = "Please enter a location or #MLS";
	}

	#Enqueue
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/swiper.min.js', array(), '3.4.2', true );
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.custom.min.js', array(), '1.4.5', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0.4', true );
	wp_enqueue_script( 'validator', get_template_directory_uri() . '/js/validator.min.js', array(), '0.11.9', true );
	wp_enqueue_script( 'autocomplete', get_template_directory_uri() . '/js/jquery.autocomplete.js', array(), '0.11.1', true );
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/basic.js', array(), '1.0', true );
	wp_localize_script( 'my-script', 'hr19', array(
		'root'        => get_template_directory_uri(),
		'cities'      => $jsoncities,
		'addresses'   => $jsonaddress,
		'postalcodes' => $jsonpostalcode,
		'msj'         => $msj,
		'acaddress'   => $acaddress,
		'accity'      => $accity,
		'acpc'        => $acpc,
		'acrequired'  => $acrequired,
	) );
}

add_action( 'wp_enqueue_scripts', 'hr_scripts' );

# PHRETS LIB
require_once( 'vendor/autoload.php' );

# MLS MIAMI
require_once( 'includes/mls/miami.php' );

# MLS ORLANDO
require_once( 'includes/mls/orlando.php' );

# MENUS ESP/ENG
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'hr19' ),
) );
register_nav_menus( array(
	'primaryeng' => __( 'Primary Menu ENG', 'hr19' ),
) );

# GETTING CPT, META, TAX
$postTypeDir = array(
	__DIR__ . '/includes/post-types/header-footer/',
	__DIR__ . '/includes/post-types/agent/',
	__DIR__ . '/includes/post-types/property/',
	__DIR__ . '/includes/post-types/about-us/',
	__DIR__ . '/includes/post-types/office/',
);
$files       = array(
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

# CALLING CPT FUNCTION
function call_create_post_types() {
	#General Settings
	create_post_type_header_footer();
	#Agents
	create_post_type_agent();
	#Property
	create_post_type_property();
	#About Us
	create_post_type_about_us();
	#Offices
	create_post_type_offices();
}

add_action( 'init', 'call_create_post_types' );

# METABOXES
function call_metaboxes() {
	#General Settings
	header_footer_metaboxes();
	#Agents
	agent_metaboxes();
	#Properties
	property_metaboxes();
	#About Us
	about_us_metaboxes();
}

add_action( 'cmb2_admin_init', 'call_metaboxes' );

# REGISTERING CUSTOM QUERY VARS FOR PROPERTY SEARCH
function pr_register_query_vars( $vars ) {
	$vars[] = 'city';
	$vars[] = 'type';
	$vars[] = 'price';
	$vars[] = 'beds';
	$vars[] = 'baths';
	$vars[] = 'min';
	$vars[] = 'max';
	$vars[] = 'price';
	$vars[] = 'showowner';
	$vars[] = 'rooms';
	$vars[] = 'proptype';
	$vars[] = 'proporderby';
	$vars[] = 'proporder';
	$vars[] = 'propsort';
	$vars[] = 'property_status';

	return $vars;
}

add_filter( 'query_vars', 'pr_register_query_vars' );

# MODIFY DEFAULT WP SEARCH FUNCTION
add_action( 'pre_get_posts', function ( $q ) {
	if ( $title = $q->get( '_meta_or_title' ) ) {
		add_filter( 'get_meta_sql', function ( $sql ) use ( $title ) {
			global $wpdb;
			static $nr = 0;
			if ( 0 != $nr ++ ) {
				return $sql;
			}
			$sql['where'] = sprintf(
				" AND ( %s OR %s ) ",
				$wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title ),
				mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
			);

			return $sql;
		} );
	}
} );

# REMOVE EDITOR
function remove_page_editor() {
	remove_post_type_support( 'header_footer', 'editor' );
	remove_post_type_support( 'banner', 'editor' );
	remove_post_type_support( 'about_us', 'editor' );
}

add_action( 'init', 'remove_page_editor' );

# SVG HOOK
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

# LOGIN CUSTOMIZATION
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

add_action( 'login_head', 'custom_login_logo' );

# ADMIN FOOTER CUSTOMATIZATION
function remove_footer_admin() {
	echo '<span id="footer-thankyou">Desarrollado para HR19</span>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );

# ENABLE PAGINATION IN SEARCH PAGE
function my_post_count_queries( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_search() ) {
			$query->set( 'posts_per_page', 1 );
		}
	}
}

add_action( 'pre_get_posts', 'my_post_count_queries' );