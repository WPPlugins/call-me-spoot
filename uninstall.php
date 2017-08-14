<?php 
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}
//delete call_me_spoot_options
delete_option("call_me_spoot_options");

//unregister_post_type spwp86_contact_form
add_action('init', 'call_me_spoot_unregister_post_type', 999);
function call_me_spoot_unregister_post_type(){
	unregister_post_type('spwp86_contact_form');
}
