<?php

load_theme_textdomain('hr', get_template_directory() . '/languages');

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus(array(
    'primary' => __('Primary Menu', 'hr19'),
    'extra-menu' => __('Extra Menu')
));

add_theme_support('menus');


// Login customization
add_action('login_head', 'custom_login_logo');

function custom_login_logo() {
    echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo('template_directory') . '/assets/hr19.svg) !important;
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

add_filter('admin_footer_text', 'remove_footer_admin');

    add_theme_support( 'menus' );

    // Directories that contain post-types
    $postTypeDir = array (
        __DIR__.'/includes/post-types/header-footer/',
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
        // Post Type for General Settings
        create_post_type_header_footer();
    }

    /* Remove text area field from header and footer */
    function remove_page_editor() {
      remove_post_type_support( 'header_footer', 'editor' );
      remove_post_type_support( 'banner', 'editor' );
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
    }

    //SVG Hook
    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');