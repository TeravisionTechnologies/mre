<?php

function property_metaboxes() {

	$prefix = '_pr_';

	$cmb_property = new_cmb2_box(
		array(
			'id' => 'propertyinfo',
			'title' => __('Property Extra Information'),
			'object_types' => 'property',
			'context' => 'normal',
			'priority' => 'high'
		)
	);

	$cmb_property->add_field(array(
		'name' => __('State'),
		'id' => $prefix . 'state',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('City'),
		'id' => $prefix . 'city',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Community'),
		'id' => $prefix . 'community',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Subdivision'),
		'id' => $prefix . 'subdiv',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Address'),
		'id' => $prefix . 'address',
		'type' => 'text',
	));

	$cmb_property->add_field(
		array(
			'name' => __('Property Price'),
			'id' => $prefix . 'current_price',
			'type' => 'text'
		)
	);

	$cmb_property->add_field(array(
		'name' => __('Type of Property'),
		'id' => $prefix . 'type_of_property',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Rooms'),
		'id' => $prefix . 'room_count',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths'),
		'id' => $prefix . 'baths_total',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths Full'),
		'id' => $prefix . 'baths_full',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths Half'),
		'id' => $prefix . 'baths_half',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Square FT'),
		'id' => $prefix . 'sqft',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Surface'),
		'id' => $prefix . 'surf',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('HOA Fees'),
		'id' => $prefix . 'hoa',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Year Built'),
		'id' => $prefix . 'yearbuilt',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Agent ID'),
		'id' => $prefix . 'agentid',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Matrix ID'),
		'id' => $prefix . 'matrixid',
		'type' => 'text',
	));


}
