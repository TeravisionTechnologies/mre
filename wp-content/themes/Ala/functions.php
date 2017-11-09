<?php
/**
 *  Created by PhpStorm.
 *  User: mtoledo
 *  Date: 3/8/17
 *  Time: 8:19 AM
 **/

// Loads css or js files
add_action('wp_enqueue_scripts', 'mre_enqueue_scripts');

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus(
  array(
    'primary'    => __( 'Primary Menu', 'mre' ),
    'extra-menu' => __( 'Extra Menu', 'mre'  )
  )
);

add_theme_support( 'menus' );

function mre_enqueue_scripts() {
 // wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );
  //wp_enqueue_script( 'script', get_template_directory_uri() . '/js/basic.css', array(), '1' );
}

// Directories that contain post-types
$postTypeDir = array (
    __DIR__.'/includes/post-types/broker/',
    __DIR__.'/includes/post-types/header-footer/',
    __DIR__.'/includes/post-types/banner/',
    __DIR__.'/includes/post-types/office/',
    __DIR__.'/includes/post-types/about-us/',
);

// File names inside post-types dirs
$files = array (
    'meta-boxes.php',
    'post-type.php',
    'taxonomy.php'
);

foreach ($postTypeDir as $directory) {
  foreach ($files as $file) {
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
    // Post Type for Banners/Sliders
    create_post_type_banner();
    // Post Type for Broker
    create_post_type_broker();
    // Post Type for General Settings
    create_post_type_header_footer();
    // Post Type for Offices
    create_post_type_offices();
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
  // Metaboxes for Broker
  broker_metaboxes();
  // Metaboxes for General Settings
  header_footer_metaboxes();
  banner_metaboxes();
  // Metaboxes for About  Us
  about_us_metaboxes();
}

/*function custom_form_validation_filter($result, $tag) {
  $name = $tag['name'];
  $value = $_POST[$name];
  if($name == 'your-name') {
    if (!preg_match('/[a-zA-Z]/', $value)){
      $result->invalidate( $tag, "You can only use characters." );
    }
  }
  if($name == 'your-email') {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $result->invalidate( $tag, "Invalid email format." );
    }
  }
  return $result;
}
add_filter('wpcf7_validate_text','custom_form_validation_filter', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_form_validation_filter', 10, 2);
add_filter('wpcf7_validate_email', 'custom_form_validation_filter', 10, 2);*/

//SVG Hook
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/****** Personalización del Login ******/

add_action('login_head', 'custom_login_logo');

function custom_login_logo() {
    echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo('template_directory') . '/assets/ala19.svg) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        #login h1 a{ 
            height: 130px!important; 
        }
        #wp-submit{
            background: #ffffff !important;
            border: solid 2px #000000 !important;
            color: #000000;
            -webkit-box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            text-shadow: none !important;
            border-radius: 0 !important;
            font-weight:bold;
        }
        a { 
            background-image:none !important; color: #fff !important;
        }
        #nav, #backtoblog{font-size: 11px!important;text-align: center;color: #fff!important;}
        .login form{ -webkit-border-radius: 5px; background-color: rgba(255,255,255,0.4);-webkit-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4); }
        .login label, .login form .forgetmenot label{ color:#555!important;font-weight:bold;font-size: 12px; }
        .postbox{ display:none!important; }
        #nav a{ color:#000000!important;font-weight:bold; }
        #backtoblog a{ color:#000000!important;font-weight:bold; }
    </style>';
}


/****** Personalización del Footer en el Admin ******/

function remove_footer_admin ()  {
    echo '<span id="footer-thankyou">Desarrollado para Merand Real Estate</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
