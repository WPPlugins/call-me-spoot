<?php

//Register & enqueue styles
add_action('admin_enqueue_scripts', 'spwp86_contact_form_enqueue_admin_style');
function spwp86_contact_form_enqueue_admin_style()  {
	wp_register_style('spwp86_admin_css', plugins_url('assets/css/admin-style.css', __FILE__), false, false, 'all');
	wp_enqueue_style('spwp86_admin_css');
	//to display form's style in the control panel
	wp_register_style('spwp86_css', plugins_url('assets/css/style.css', __FILE__), false, false, 'all');
	wp_enqueue_style('spwp86_css');
}

add_action('wp_enqueue_scripts', 'spwp86_contact_form_enqueue_style');
function spwp86_contact_form_enqueue_style()  {
	wp_register_style('spwp86_css', plugins_url('assets/css/style.css', __FILE__), false, false, 'all');
	wp_enqueue_style('spwp86_css');
}

//Hooking wp-color-picker
function add_admin_iris_scripts($hook){
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'add_admin_iris_scripts');

//Hooking dashicons
function spwp86_dashicons() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'spwp86_dashicons' );
