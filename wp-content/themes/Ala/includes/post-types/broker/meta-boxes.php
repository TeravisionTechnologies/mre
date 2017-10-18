<?php

function broker_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_br_';

    // Initiate the metabox
    $cmb = new_cmb2_box(
            array(
                'id' => 'broker_boxes',
                'title' => __('Property Information'),
                'object_types' => 'broker',
                'context' => 'normal',
                'priority' => 'high',
            )
    );

    $cmb->add_field(array(
        'name' => __('Property Image'),
        'desc' => 'Upload an image',
        'id' => $prefix . 'images',
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



    // Property Price
    $cmb->add_field(
            array(
                'name' => __('Property Price'),
                'desc' => __('The price of the current property'),
                'id' => $prefix . 'price',
                'type' => 'text',
                'repeatable' => false
            )
    );

    // Property Address
    $cmb->add_field(
            array(
                'name' => __('Property Address'),
                'desc' => __('The address of the current property'),
                'id' => $prefix . 'address',
                'type' => 'text',
                'repeatable' => false
            )
    );
    
    // Interior Details Text
    $cmb->add_field(
            array(
                'name' => __('Interior Details'),
                'id' => $prefix . 'intdetails',
                'type' => 'wysiwyg',
                'options' => array(),
            )
    );
    
    // Interior Details Images
    $cmb->add_field(
            array(
                'name' => __('Interior Details Images'),
                'id' => $prefix . 'intimages',
                'type' => 'file_list',
                'preview_size' => array(100, 100),
                'text' =>
                array(
                    'add_upload_files_text' => __('Add or Upload Images'), // default: "Add or Upload Files"
                    'file_text' => __('Image:'), // default: "File:"
                ),
                'repeatable' => false
            )
    );
    
    // Name
    $cmb->add_group_field($group_field, array(
        'name' => __('Detail Name'),
        'desc' => __('Interior detail Name for the image uploaded above'),
        'id' => $prefix . 'name',
        'type' => 'text',
        'repeatable' => false
            )
    );

    // Amenities
    $cmb->add_field(
            array(
                'name' => 'Amenities',
                'id' => $prefix . 'amen',
                'type' => 'wysiwyg',
                'options' => array(),
            )
    );

    // Amenities Images
    $cmb->add_field(
            array(
                'name' => __('Amenities Images'),
                'id' => $prefix . 'amengallery',
                'type' => 'file_list',
                'preview_size' => array(100, 100),
                'text' =>
                array(
                    'add_upload_files_text' => __('Add or Upload Images'), // default: "Add or Upload Files"
                    'file_text' => __('Image:'), // default: "File:"
                ),
                'repeatable' => false
            )
    );
    
    // Plaina Images
    $cmb->add_field(
            array(
                'name' => __('Plains Images / Videos'),
                'id' => $prefix . 'plainsgallery',
                'type' => 'file_list',
                'preview_size' => array(100, 100),
                'text' =>
                array(
                    'add_upload_files_text' => __('Add or Upload Images/Videos'), // default: "Add or Upload Files"
                    'file_text' => __('Image/Video:'), // default: "File:"
                ),
                'repeatable' => false
            )
    );
    
    

    // Type of transaction
    $cmb->add_field(
            array(
                'name' => __('Transaction type'),
                'desc' => __('Specify if the type of transaction (buy/sell)'),
                'id' => $prefix . 'type',
                'type' => 'text',
                'repeatable' => false
            )
    );

    // Neighborhood Description
    $cmb->add_field(
            array(
                'name' => __('Neighborhood Description'),
                'desc' => __('Description of the neighborhood'),
                'id' => $prefix . 'neighborhood',
                'type' => 'text',
                'repeatable' => false
            )
    );
    
    // Quality
    $cmb->add_field(
            array(
                'name' => 'Quality Memory',
                'id' => $prefix . 'quality',
                'type' => 'wysiwyg',
                'options' => array(),
            )
    );

    $cmb->add_field(array(
        'name' => __('Downloadable Memory'),
        'desc' => __('Upload file'),
        'id' => $prefix . 'memofiles',
        'type' => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text' => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    // Longitude
    $cmb->add_field(
            array(
                'name' => __('Longitude'),
                'id' => $prefix . 'lng',
                'type' => 'text',
                'repeatable' => false
            )
    );

    // Latitude
    $cmb->add_field(
            array(
                'name' => __('Latitude'),
                'id' => $prefix . 'lat',
                'type' => 'text',
                'repeatable' => false
            )
    );

    // Important
    $cmb->add_field(
            array(
                'name' => __('Important'),
                'id' => $prefix . 'important',
                'desc' => __('Property with this checked will appear first'),
                'type' => 'checkbox',
                'repeatable' => false
            )
    );

    $cmb->add_field(array(
        'name' => 'Brochure',
        'desc' => 'Upload a PDF file',
        'id' => $prefix . 'brochure',
        'type' => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text' => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => 'application/pdf', // Make library only display PDFs.
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ));

    $cmb->add_field(array(
        'name' => 'Plans (compressed file)',
        'desc' => 'Upload a .zip file',
        'id' => $prefix . 'pzip',
        'type' => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text' => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    $cmb->add_field( array(
        'name'           => 'List of Nearby Places',
        'desc'           => 'Select one or more places',
        'id'             => 'wiki_test_taxonomy_multicheck',
        'taxonomy'       => 'nearby_places',
        'type'           => 'taxonomy_multicheck_inline',
        'text'           => array(
            'no_terms_text' => 'Sorry, no terms could be found.'
        ),
        'remove_default' => 'true' // Removes the default metabox provided by WP core. Pending release as of Aug-10-16
    ) );
    
}
