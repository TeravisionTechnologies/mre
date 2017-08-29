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

		// Regular text field
		$cmb->add_field(
			array(
				'name'       => __( 'Text Field' ),
				'desc'       => __( 'field description (optional)' ),
				'id'         => $prefix . 'text',
				'type'       => 'text',
				'repeatable' => false
			)
		);

	}