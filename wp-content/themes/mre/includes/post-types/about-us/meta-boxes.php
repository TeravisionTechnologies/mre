<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/08/17
 * Time: 03:19 PM
 */

	function about_us_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_about_';

		// Initiate the metabox
		$cmb = new_cmb2_box(
			array(
				'id'            => 'about_us_boxes',
				'title'         => __( 'Additional Sections' ),
				'object_types'  => 'about_us', // Post type
				'context'       => 'normal',
				'priority'      => 'high'
			)
		);

		// Partners Section
		$cmb->add_field(
			array(
				'name'       => __( 'Partners' ),
				'desc'       => __( 'Add Partners' ),
				'id'         => $prefix . 'partner',
				'type'       => 'text',
				'repeatable' => false
			)
		);

	}