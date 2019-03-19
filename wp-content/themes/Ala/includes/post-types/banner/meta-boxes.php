<?php

function banner_metaboxes() {

    $prefix = '_br_';

    $cmb = new_cmb2_box(
        array(
            'id' => 'banner_boxes',
            'title' => __('Banner Information'),
            'object_types' => 'banner',
            'context' => 'normal',
            'priority' => 'high',
        )
    );

    $cmb->add_field(array(
        'name' => 'Background Image',
        'desc' => 'Upload an image for the slider',
        'id' => $prefix . 'bannerimg',
        'type' => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text' => array(
            'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    $cmb->add_field(array(
        'name' => 'CTA Link',
        'desc' => 'Set call to action link',
        'id' => $prefix . 'bannerurl',
        'type' => 'text'
    ));

    $cmb->add_field(array(
        'name' => 'CTA Text',
        'desc' => 'Set call to action text',
        'id' => $prefix . 'bannerctatxt',
        'type' => 'text'
    ));

}