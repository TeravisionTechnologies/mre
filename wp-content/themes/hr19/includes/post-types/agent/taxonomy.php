<?php

// Register Custom Taxonomy
function create_taxonomy_agent_type() {
    $labels = array(
        'name' => _x('Agent Type', 'Taxonomy General Name', 'hr'),
        'singular_name' => _x('Agent Type', 'Taxonomy Singular Name', 'hr'),
        'menu_name' => __('Agent Types', 'hr'),
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
    register_taxonomy('agent_type', array('agent'), $args);
}

add_action('init', 'create_taxonomy_agent_type', 0);