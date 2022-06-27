<?php
/**
 * @package TE Override
 * @version 1.0
 */
/*
Plugin Name: Community Forms Overrides
Plugin URI: https://bellaworksweb.com
Description: Makes certain fields required.
Author: Austin Crane
Version: 1.0
Author URI: https://bellaworksweb.com
*/

/**
 *   Bring in the Styles
 * 
*/
function comm_forms_override() {
	
	wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.5.1', false);
		wp_enqueue_script('jquery');

	wp_enqueue_style( 
		'comm-forms-override-css',
		  plugin_dir_url( __FILE__ ) . 'comm-forms-override.css',
		 array(),
		 '1.65'
	);
	wp_enqueue_script( 
		'comm-forms-override-js', plugin_dir_url( __FILE__ ) . 'comm-forms-override.js', 
		array(), '20200713', 
		false 
	);
}
add_action( 'wp_enqueue_scripts', 'comm_forms_override' );


add_filter( 'tribe_events_community_required_fields', 'my_community_required_fields', 10, 1 );
function my_community_required_fields( $fields ) {
	if ( ! is_array( $fields ) ) {
		return $fields;
	}
	$fields[] = '_ecp_custom_2';
	$fields[] = '_ecp_custom_3'; // this is the field name for the input you want to require
	$fields[] = '_ecp_custom_4';

 return $fields;
}