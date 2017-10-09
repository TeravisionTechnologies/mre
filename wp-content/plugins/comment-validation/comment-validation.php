<?php
/*
Plugin Name: Comment Validation
Plugin URI: http://bassistance.de/wordpress-plugin-comment-validation/
Description: Client-side validation for comments
Author: Jörn Zaefferer
Version: 0.4
Author URI: http://bassistance.de
*/

function load_comment_validation() {
	wp_enqueue_style( 'commentvalidation', WP_PLUGIN_URL . '/comment-validation/comment-validation.css');
	wp_enqueue_script('jqueryvalidate', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js', array('jquery'));
	wp_enqueue_script('jqueryvalidatemethods', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js', array('jquery'));
	wp_enqueue_script('commentvalidation', WP_PLUGIN_URL . '/comment-validation/comment-validation.js', array('jquery','jqueryvalidate'));
}

add_action('init', 'load_comment_validation');

?>