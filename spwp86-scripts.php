<?php

//Register & enqueue scripts
add_action('wp_head','spwp86_contact_form_enqueue_scripts',5,2);
function spwp86_contact_form_enqueue_scripts() {
	wp_register_script('spwp86_script', plugins_url('assets/js/script.js', __FILE__));
	wp_enqueue_script('spwp86_script');
}    

add_action('wp_head','spwp86_contact_phone_mask',5,2);
function spwp86_contact_phone_mask() {
	wp_register_script( 'spwp86_contact_phone_mask', plugins_url('assets/js/phone_mask.js', __FILE__));
	wp_enqueue_script( 'spwp86_contact_phone_mask' );
}

add_action('admin_enqueue_scripts', 'spwp86_contact_form_admin_enqueue_scripts');
function spwp86_contact_form_admin_enqueue_scripts() {
	wp_register_script('spwp86_admin_script', plugins_url('assets/js/admin-script.js', __FILE__));
	wp_enqueue_script('spwp86_admin_script');
}
