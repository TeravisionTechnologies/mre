<?php

function custom_taxonomy_property_status()
{
    $labels = array(
        'name' => _x('Property Status', 'Taxonomy General Name', 'ala'),
        'singular_name' => _x('Property Status', 'Taxonomy Singular Name', 'ala'),
        'menu_name' => __('Property Status', 'ala'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('property_status', array('broker'), $args);
}

add_action('init', 'custom_taxonomy_property_status', 0);


function custom_taxonomy_property_location()
{
    $labels = array(
        'name' => _x('Property Location', 'Taxonomy General Name', 'ala'),
        'singular_name' => _x('Property Location', 'Taxonomy Singular Name', 'ala'),
        'menu_name' => __('Property Location', 'ala'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('property_location', array('broker'), $args);
}

add_action('init', 'custom_taxonomy_property_location', 0);


function custom_taxonomy_nearby_places()
{
    $labels = array(
        'name' => _x('Nearby Places', 'Taxonomy General Name', 'ala'),
        'singular_name' => _x('Nearby Place', 'Taxonomy Singular Name', 'ala'),
        'menu_name' => __('Nearby Places', 'ala'),
        'all_items' => __('All Items', 'ala'),
        'parent_item' => __('Parent Item', 'ala'),
        'parent_item_colon' => __('Parent Item:', 'ala'),
        'new_item_name' => __('New Item Name', 'ala'),
        'add_new_item' => __('Add New Item', 'ala'),
        'edit_item' => __('Edit Item', 'ala'),
        'update_item' => __('Update Item', 'ala'),
        'view_item' => __('View Item', 'ala'),
        'separate_items_with_commas' => __('Separate items with commas', 'ala'),
        'add_or_remove_items' => __('Add or remove items', 'ala'),
        'choose_from_most_used' => __('Choose from the most used', 'ala'),
        'popular_items' => __('Popular Items', 'ala'),
        'search_items' => __('Search Items', 'ala'),
        'not_found' => __('Not Found', 'ala'),
        'no_terms' => __('No items', 'ala'),
        'items_list' => __('Items list', 'ala'),
        'items_list_navigation' => __('Items list navigation', 'ala'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('nearby_places', array('broker'), $args);
}

add_action('init', 'custom_taxonomy_nearby_places', 0);


