<?php

function agent_metaboxes() {

    $prefix = '_ag_';

    $cmb_agent = new_cmb2_box(
        array(
            'id' => 'agentextinfo',
            'title' => __('Agent Extra Information'),
            'object_types' => 'agent',
            'context' => 'normal',
            'priority' => 'high'
        )
    );

    $cmb_agent->add_field(
        array(
            'name' => __('Phone Number'),
            'id' => $prefix . 'phone',
            'type' => 'text',
            'repeatable' => false
        )
    );

    $cmb_agent->add_field(array(
        'name' => __('Email'),
        'id' => $prefix . 'mail',
        'type' => 'text_email',
    ));

}
