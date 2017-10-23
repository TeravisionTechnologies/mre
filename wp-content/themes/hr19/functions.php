<?php
    // Loads css file
    wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );

    load_theme_textdomain('hr', get_template_directory() . '/languages');

    // Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hr19' ),
        'extra-menu' => __( 'Extra Menu' )
    ) );

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