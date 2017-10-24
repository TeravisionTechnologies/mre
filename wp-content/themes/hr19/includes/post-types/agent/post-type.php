<?php

// Register Custom Post Type
function create_post_type_agent() {
    $labels = array(
        'name' => _x('Agents', 'Post Type General Name', 'hr'),
        'singular_name' => _x('Agent', 'Post Type Singular Name', 'hr'),
        'menu_name' => __('Agents', 'hr'),
        'name_admin_bar' => __('Agents', 'hr'),
        'all_items' => __('All Agents', 'hr'),
        'add_new_item' => __('Add New Agent', 'hr'),
        'add_new' => __('Add New', 'hr'),
        'new_item' => __('New Agent', 'hr'),
        'edit_item' => __('Edit Agent', 'hr'),
        'update_item' => __('Update Agent', 'hr'),
        'view_item' => __('View Agent', 'hr'),
        'view_items' => __('View Agents', 'hr'),
        'search_items' => __('Search Agent', 'hr'),
    );
    $args = array(
        'label' => __('Agent', 'hr'),
        'description' => __('Agents', 'hr'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-businessman',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('agent', $args);
}

add_action('init', 'create_post_type_agent', 0);