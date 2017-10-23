<?php

// Register Custom Taxonomy
function create_taxonomy_country()
{
    $labels = array(
        'name' => _x('Countries', 'Taxonomy General Name', 'ala'),
        'singular_name' => _x('Country', 'Taxonomy Singular Name', 'ala'),
        'menu_name' => __('Countries', 'ala'),
        'all_items' => __('All Countries', 'ala'),
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
    register_taxonomy('country', array('office'), $args);
}

add_action('init', 'create_taxonomy_country', 0);