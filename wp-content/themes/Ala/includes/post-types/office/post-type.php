<?php

// Register Custom Post Type
function create_post_type_offices()
{
    $labels = array(
        'name' => _x('Office', 'Post Type General Name', 'ala'),
        'singular_name' => _x('Office', 'Post Type Singular Name', 'ala'),
        'menu_name' => __('Offices', 'ala'),
        'name_admin_bar' => __('Offices', 'ala')
    );
    $args = array(
        'label' => __('office', 'ala'),
        'description' => __('ALA 19 Offices', 'ala'),
        'labels' => $labels,
        'supports' => array('title', 'editor',),
        'taxonomies' => array('country'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 35,
        'menu_icon' => 'dashicons-networking',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('office', $args);
}

add_action('init', 'create_post_type_offices', 0);