<?php

function create_post_type_places() {
    register_post_type('places', array(
        'labels' => array(
            'name' => __('Nearby Places'),
            'singular_name' => __('Places'),
            'add_new' => __('Add a New Place'),
            'edit_item' => __('Edit Place'),
            'new_item' => __('New Place'),
            'view_item' => __('View Place'),
            'view_items' => __('View Place'),
            'all_items' => __('Places'),
        ),
        'public' => true,
       )
    );
}
