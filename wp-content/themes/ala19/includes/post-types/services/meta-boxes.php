<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:18 PM
 */

	function services_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_sv_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'services_boxes',
				'title'         => __( 'Services Boxes' ),
				'object_types'  => 'services', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

        // Image
        $cmb->add_field(
            array(
                'name'         => __( 'Property Images' ),
                'id'           => $prefix . 'image',
                'type'         => 'file',
                'preview_size' => array(100,100),
                'text'         =>
                    array(
                        'add_upload_file_text' => __( 'Add or Upload an Image' ), // default: "Add or Upload Files"
                    ),
                'repeatable'   => false,
                'options'      => array(
                    'url' => false, // Hide the text input for the url
                )
            )
        );

		// Description
		$cmb->add_field(
			array(
				'name'       => __( 'Description' ),
				'desc'       => __( 'Description of the service' ),
				'id'         => $prefix . 'desc',
				'type'       => 'textarea',
				'repeatable' => false
			)
		);

	}