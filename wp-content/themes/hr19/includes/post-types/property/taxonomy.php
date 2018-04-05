<?php

// Register Custom Taxonomy
function custom_taxonomy_nearby_places()
{
	$labels = array(
		'name' => _x('Nearby Places', 'Taxonomy General Name', 'hr'),
		'singular_name' => _x('Nearby Place', 'Taxonomy Singular Name', 'hr'),
		'menu_name' => __('Nearby Places', 'hr'),
		'all_items' => __('All Items', 'hr'),
		'parent_item' => __('Parent Item', 'hr'),
		'parent_item_colon' => __('Parent Item:', 'hr'),
		'new_item_name' => __('New Item Name', 'hr'),
		'add_new_item' => __('Add New Item', 'hr'),
		'edit_item' => __('Edit Item', 'hr'),
		'update_item' => __('Update Item', 'hr'),
		'view_item' => __('View Item', 'hr'),
		'separate_items_with_commas' => __('Separate items with commas', 'hr'),
		'add_or_remove_items' => __('Add or remove items', 'hr'),
		'choose_from_most_used' => __('Choose from the most used', 'hr'),
		'popular_items' => __('Popular Items', 'hr'),
		'search_items' => __('Search Items', 'hr'),
		'not_found' => __('Not Found', 'hr'),
		'no_terms' => __('No items', 'hr'),
		'items_list' => __('Items list', 'hr'),
		'items_list_navigation' => __('Items list navigation', 'hr'),
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
	register_taxonomy('nearby_places', array('property'), $args);
}

add_action('init', 'custom_taxonomy_nearby_places', 0);