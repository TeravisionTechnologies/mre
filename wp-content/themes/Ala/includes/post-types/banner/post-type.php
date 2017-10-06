<?php

function create_post_type_banner() {
    register_post_type( 'banner',
        array(
            'labels' => array(
                'name'          => __( 'Banner/Slider' ),
                'singular_name' => __( 'Banner/Slider' ),
                'add_new'       => __( 'Add a New Banner/Slider' ),
                'edit_item'     => __( 'Edit Banner/Slider' ),
                'new_item'      => __( 'New Banner/Slider' ),
                'view_item'     => __( 'View Banner/Slider' ),
                'view_items'    => __( 'View Banner/Slider' ),
                'all_items'     => __( 'All Banner/Slider' ),
            ),
            'public' => true,
        )
    );
}