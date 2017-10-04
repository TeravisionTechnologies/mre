<?php

function places_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_pl_';

    // Initiate the metabox for the Place
    $cmb = new_cmb2_box(
            array(
                'id' => 'Place Information',
                'title' => __('Place Information'),
                'object_types' => 'places', // Post type
                'context' => 'normal',
                'priority' => 'high'
            )
    );

    // URL Place
    $cmb->add_field(
            array(
                'name' => __('URL Place'),
                'id' => $prefix . 'plaurl',
                'type' => 'text_url',
            )
    );

    $cmb->add_field(array(
        'name' => __('Place Image'),
        'desc' => 'Upload an image',
        'id' => $prefix . 'plaimage',
        'type' => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text' => array(
            'add_upload_file_text' => 'Add image' // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'small', // Image size to use when previewing in the admin.
    ));
}
