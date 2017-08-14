<?php

//hiding publishing actions, comments
function spwp86_hide_publishing_actions(){
        $spwp86_post_type = 'spwp86_contact_form';
        global $post;
        if($post->post_type == $spwp86_post_type){
            echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions,
                    #commentstatusdiv,
                    #commentsdiv{
                        display:none;
                    }
                </style>
            ';
        }
}
add_action('admin_head-post.php', 'spwp86_hide_publishing_actions');
add_action('admin_head-post-new.php', 'spwp86_hide_publishing_actions');

//hiding row actions(edit, view, quick edit)
function spwp86_remove_row_actions($actions, $page_object) {
	$spwp86_post_type = get_post_type();
	if($spwp86_post_type == 'spwp86_contact_form'){
		unset ($actions['edit']);
		unset ($actions['view']);
		unset ($actions['inline hide-if-no-js']);
	}
	return $actions;
}
add_filter('post_row_actions', 'spwp86_remove_row_actions',10,2);

//hiding column(date)
function spwp86_remove_date_column($defaults) {
	$spwp86_post_type = get_post_type();
	if($spwp86_post_type == 'spwp86_contact_form'){
		unset($defaults['date']);
	}
	return $defaults;
}
add_filter('manage_posts_columns', 'spwp86_remove_date_column');

//adding column(ShortCode)
function spwp86_contact_form_shortcode_id($defaults){
	$spwp86_post_type = get_post_type();
	if($spwp86_post_type == 'spwp86_contact_form'){
		$defaults['spwp86_id'] = 'ShortCode';
	}
	return $defaults;
}
add_filter('manage_posts_columns', 'spwp86_contact_form_shortcode_id', 5);

//adding column(ShortCode)
function add_spwp86_contact_form_shortcode_id($column_name, $id){
	$spwp86_post_type = get_post_type( $id );
	if($spwp86_post_type == 'spwp86_contact_form'){
		if($column_name === 'spwp86_id'){
			echo'<a href="http://web-cude.com/" target="_blank">Pro Version</a>';
		}
	}
}
add_action('manage_posts_custom_column', 'add_spwp86_contact_form_shortcode_id', 5, 2);

//adding column(Short Code Link)
function spwp86_contact_form_shortcode_link($defaults){
	$spwp86_post_type = get_post_type();
	if($spwp86_post_type == 'spwp86_contact_form'){
		$defaults['spwp86_link'] = 'Short code link';
	}
	return $defaults;
}
add_filter('manage_posts_columns', 'spwp86_contact_form_shortcode_link', 5);

//adding column(Short Code Link)
function add_spwp86_contact_form_shortcode_link($column_name, $id){
	$spwp86_post_type = get_post_type($id);
	$spwp86_meta = get_spwp86_meta_box_data($id);
	if($spwp86_post_type == 'spwp86_contact_form'){
		if($column_name === 'spwp86_link'){
			echo'<a href="http://web-cude.com/" target="_blank">Pro Version</a>';
		}
	}
}
add_action('manage_posts_custom_column', 'add_spwp86_contact_form_shortcode_link', 5, 2);

//adding column(Short Code Button)
function spwp86_contact_form_shortcode_button($defaults){
	$spwp86_post_type = get_post_type();
	if($spwp86_post_type == 'spwp86_contact_form'){
		$defaults['spwp86_button'] = 'Short code button';
	}
	return $defaults;
}
add_filter('manage_posts_columns', 'spwp86_contact_form_shortcode_button', 5);

//adding column(Short Code Button)
function add_spwp86_contact_form_shortcode_button($column_name, $id){
	$spwp86_post_type = get_post_type($id);
	$spwp86_meta = get_spwp86_meta_box_data($id);
	if($spwp86_post_type == 'spwp86_contact_form'){
		if($column_name === 'spwp86_button'){
			echo'<a href="http://web-cude.com/" target="_blank">Pro Version</a>';
		}
	}
}
add_action('manage_posts_custom_column', 'add_spwp86_contact_form_shortcode_button', 5, 2);



//setting menu
add_action('admin_menu', 'call_me_spoot_admin_menu_setup');
function call_me_spoot_admin_menu_setup() {
    add_submenu_page(
        'options-general.php',
        'Call me spoot 2.6',
        'Call me spoot',
        'manage_options',
        'call_me_spoot',
        'call_me_spoot_admin_page_screen'
    );
}

//setting page
function call_me_spoot_admin_page_screen() {
    global $submenu;
    $page_data = array();
    foreach ($submenu['options-general.php'] as $i => $menu_item) {
        if ($submenu['options-general.php'][$i][2] == 'call_me_spoot') {
            $page_data = $submenu['options-general.php'][$i];
        }
    }
?><div class="wrap">
        <?php screen_icon(); ?>
        <h2><?php echo $page_data[3]; ?></h2>
        <form id="call_me_spoot_options" action="options.php" method="post">
            <?php
            settings_fields('call_me_spoot_options');
            do_settings_sections('call_me_spoot');
            do_settings_sections('call_me_spoot_lable_field');
            do_settings_sections('call_me_spoot_button_field');
            submit_button('Save options', 'primary', 'call_me_spoot_options_submit');
            ?>
        </form>
    </div>
<?php }

//settings link
add_filter('plugin_action_links', 'call_me_spoot_settings_link', 2, 2);
function call_me_spoot_settings_link($actions, $file) {
    if (false !== strpos($file, 'call-me-spoot')) {$actions['settings'] = '<a href="options-general.php?page=call_me_spoot">Settings</a>';}
    return $actions;
}

//feedback button settings
add_action('admin_init', 'call_me_spoot_settings_init');
function call_me_spoot_settings_init() {
    register_setting(
        'call_me_spoot_options',
        'call_me_spoot_options',
        'call_me_spoot_options_validate'
    );

	add_settings_section(
        'call_me_spoot_button_field',
        'Customize button',
        'call_me_spoot_button_desc',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_enable_button',
        'Enable button',
        'call_me_spoot_enable_button_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_enable_mobile',
        'Enable on mobile device',
        'call_me_spoot_enable_mobile_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_forms',
        'Forms',
        'call_me_spoot_forms_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_position',
        'Position',
        'call_me_spoot_position_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_bottom',
        'Bottom',
        'call_me_spoot_bottom_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_left',
        'Left',
        'call_me_spoot_left_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_right',
        'Right',
        'call_me_spoot_right_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_icon',
        'Icon',
        'call_me_spoot_icon_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_animation',
        'Animation',
        'call_me_spoot_animation_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

     add_settings_field(
        'spoot_s_border_color',
        'Border color',
        'call_me_spoot_border_color_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_color',
        'Color button',
        'call_me_spoot_color_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

    add_settings_field(
        'spoot_s_icon_color',
        'Icon color',
        'call_me_spoot_icon_color_field',
        'call_me_spoot_button_field',
        'call_me_spoot_button_field'
    );

}

//options validate
function call_me_spoot_options_validate($input) {
    global $allowedposttags, $allowedrichhtml;

	if(isset($input['spoot_s_enable_button'])){$input['spoot_s_enable_button']=spwp86_validate_data("1", "n", sanitize_key($input['spoot_s_enable_button']));}

	if(isset($input['spoot_s_enable_mobile'])){$input['spoot_s_enable_mobile']=spwp86_validate_data("1", "n", sanitize_key($input['spoot_s_enable_mobile']));}

    if(isset($input['spoot_s_forms'])){$input['spoot_s_forms']=spwp86_validate_data("4", "y", sanitize_key($input['spoot_s_forms']));}

    if(isset($input['spoot_s_position'])){$input['spoot_s_position']=spwp86_validate_data("6", "n", sanitize_key($input['spoot_s_position']));}

    if(isset($input['spoot_s_bottom'])){
		if(strlen($input['spoot_s_bottom'])>4){
			$spoot_s_bottom_len=strlen($input['spoot_s_bottom'])-4;
			$input['spoot_s_bottom'] = substr($input['spoot_s_bottom'], 0, -$spoot_s_bottom_len);
		}
		$input['spoot_s_bottom']=preg_replace('/[^0-9]/', '', $input['spoot_s_bottom']);
		$input['spoot_s_bottom']=spwp86_validate_data("5", "y", sanitize_text_field($input['spoot_s_bottom']));
	}

    if(isset($input['spoot_s_left'])){
		if(strlen($input['spoot_s_left'])>4){
			$spoot_s_left_len=strlen($input['spoot_s_left'])-4;
			$input['spoot_s_left'] = substr($input['spoot_s_left'], 0, -$spoot_s_left_len);
		}
		$input['spoot_s_left']=preg_replace('/[^0-9]/', '', $input['spoot_s_left']);
		$input['spoot_s_left']=spwp86_validate_data("5", "y", sanitize_text_field($input['spoot_s_left']));
	}

	if(isset($input['spoot_s_right'])){
		if(strlen($input['spoot_s_right'])>4){
			$spoot_s_right_len=strlen($input['spoot_s_right'])-4;
			$input['spoot_s_right'] = substr($input['spoot_s_right'], 0, -$spoot_s_right_len);
		}
		$input['spoot_s_right']=preg_replace('/[^0-9]/', '', $input['spoot_s_right']);
		$input['spoot_s_right']=spwp86_validate_data("5", "y", sanitize_text_field($input['spoot_s_right']));
	}

    if(isset($input['spoot_s_icon'])){$input['spoot_s_icon']=spwp86_validate_data("200", "n",sanitize_text_field($input['spoot_s_icon']));}
    if(isset($input['spoot_s_animation'])){$input['spoot_s_animation']=spwp86_validate_data("30", "n",sanitize_text_field($input['spoot_s_animation']));}
    if(isset($input['spoot_s_color'])){$input['spoot_s_color']=spwp86_validate_data("8", "n",sanitize_text_field($input['spoot_s_color']));}
	if(isset($input['spoot_s_icon_color'])){$input['spoot_s_icon_color']=spwp86_validate_data("8", "n",sanitize_text_field($input['spoot_s_icon_color']));}
	if(isset($input['spoot_s_border_color'])){$input['spoot_s_border_color']=spwp86_validate_data("8", "n",sanitize_text_field($input['spoot_s_border_color']));}

    return $input;
}

//show description
function call_me_spoot_button_desc() {
    ?><p><a href="post-new.php?post_type=spwp86_contact_form" class="page-title-action">Add Form</a> <a href="edit.php?post_type=spwp86_contact_form" class="page-title-action">All Forms</a></p>
    <?php
}

//show settings field
function call_me_spoot_enable_button_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_enable_button = (isset($options['spoot_s_enable_button'])) ? $options['spoot_s_enable_button'] : '';
?><input type="checkbox" class="checkbox" id="spoot_s_enable_button" name="call_me_spoot_options[spoot_s_enable_button]" value="y" <?php if($spoot_s_enable_button=="y"){echo "checked";}?>/><label for="spoot_s_enable_button"></label><?php }

//show settings field
function call_me_spoot_enable_mobile_field() {
    $spoot_s_enable_mobile = "n";
?><p><a href="http://web-cude.com/" target="_blank">Pro Version</a></p><?php }

//show settings field
function call_me_spoot_forms_field() {
	global $post;
    $options = get_option('call_me_spoot_options');
    $spoot_s_forms = (isset($options['spoot_s_forms'])) ? $options['spoot_s_forms'] : '';

	$posts = get_posts( array(
	'numberposts'     => 50,
	'offset'          => 0,
	'category'        => '',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'include'         => '',
	'exclude'         => '',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_type'       => 'spwp86_contact_form',
	'post_mime_type'  => '',
	'post_parent'     => '',
	'post_status'     => 'publish'
	) );

	$post_spoot = get_post($spoot_s_forms);

	if(!empty($post_spoot)){$spoot_post_title = $post_spoot->post_title;}

?><select id="spoot_s_forms" name="call_me_spoot_options[spoot_s_forms]">
	<?php if(!empty($post_spoot)){echo'<option value="'.$spoot_s_forms.'">'.$spoot_post_title.'</option>';}?>
		<option disabled>---------</option>
	<?php
		foreach($posts as $post){ setup_postdata($post);
		?><option value="<?php echo $post->ID; ?>"><?php the_title(); ?></option><?php
		}
		wp_reset_postdata();
	?>

</select>
<?php }

//show settings field
function call_me_spoot_position_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_position = (isset($options['spoot_s_position'])) ? $options['spoot_s_position'] : '';
?><select id="spoot_s_position" name="call_me_spoot_options[spoot_s_position]">
	<?php if($spoot_s_position==""){?><option value="right">right</option><?php }else{?><option selected value="<?php echo $spoot_s_position; ?>"><?php echo $spoot_s_position; ?></option><?php }?>
	<option disabled>---------</option>
	<option value="left">left</option>
	<option value="right">right</option>
</select>
<?php }

//show settings field
function call_me_spoot_bottom_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_bottom = (isset($options['spoot_s_bottom'])) ? $options['spoot_s_bottom'] : '';
    if(empty($spoot_s_bottom)){$spoot_s_bottom = "20";}
?><input id="spoot_s_bottom" name="call_me_spoot_options[spoot_s_bottom]" value="<?php echo $spoot_s_bottom; ?>" style="width:50px;"> px<?php }

//show settings field
function call_me_spoot_left_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_left = (isset($options['spoot_s_left'])) ? $options['spoot_s_left'] : '';
    if(empty($spoot_s_left)){$spoot_s_left = "20";}
?><input id="spoot_s_left" name="call_me_spoot_options[spoot_s_left]" value="<?php echo $spoot_s_left; ?>" style="width:50px;"> px<?php }

//show settings field
function call_me_spoot_right_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_right = (isset($options['spoot_s_right'])) ? $options['spoot_s_right'] : '';
    if(empty($spoot_s_right)){$spoot_s_right = "20";}
?><input id="spoot_s_right" name="call_me_spoot_options[spoot_s_right]" value="<?php echo $spoot_s_right; ?>" style="width:50px;"> px<?php }

//show settings field
function call_me_spoot_color_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_color = (isset($options['spoot_s_color'])) ? $options['spoot_s_color'] : '';
    if(empty($spoot_s_color)){$spoot_s_color = "#4682B4";}
?><div class="spoot_s_color"><input type="color" id="spoot_s_color" name="call_me_spoot_options[spoot_s_color]" value="<?php echo $spoot_s_color; ?>" style="width:50px;"></div><?php
}

//show settings field
function call_me_spoot_border_color_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_border_color = (isset($options['spoot_s_border_color'])) ? $options['spoot_s_border_color'] : '';
    if(empty($spoot_s_border_color)){$spoot_s_border_color = "#ffffff";}
?><div class="spoot_s_border_color"><input type="color" id="spoot_s_border_color" name="call_me_spoot_options[spoot_s_border_color]" value="<?php echo $spoot_s_border_color; ?>" style="width:50px;"></div><?php
}

//show settings field
function call_me_spoot_icon_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_icon = (isset($options['spoot_s_icon'])) ? $options['spoot_s_icon'] : '';
    if(empty($spoot_s_icon)){$spoot_s_icon = "dashicons dashicons-phone";}
?><input type="hidden" id="spoot_s_icon" name="call_me_spoot_options[spoot_s_icon]" value="<?php echo $spoot_s_icon; ?>">

	<select class="spoot_s_icon" name="call_me_spoot_options[spoot_s_icon]">
		<?php if($spoot_s_icon==""){ ?>
		<option value="dashicons dashicons-phone">phone</option>
		<?php }else{
			if($spoot_s_icon == "dashicons dashicons-phone"){$spoot_s_icon_name="phone";}
			if($spoot_s_icon == "dashicons dashicons-email"){$spoot_s_icon_name="email";}
		?>
		<option selected value="<?php echo $spoot_s_icon; ?>"><?php echo $spoot_s_icon_name; ?></option>
		<?php }?>
		<option disabled>---------</option>
		<option value="dashicons dashicons-phone">phone</option>
		<option value="dashicons dashicons-email">email</option>
		<option value="dashicons dashicons-email-alt" disabled>email-alt (Pro version)</option>
		<option value="dashicons dashicons-admin-users" disabled>users (Pro version)</option>
		<option value="dashicons dashicons-editor-help" disabled>help (Pro version)</option>
		<option value="dashicons dashicons-megaphone" disabled>megaphone (Pro version)</option>
		<option value="dashicons dashicons-info" disabled>info (Pro version)</option>
	</select>
<?php
}

//show settings field
function call_me_spoot_animation_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_animation = (isset($options['spoot_s_animation'])) ? $options['spoot_s_animation'] : '';
    if(empty($spoot_s_animation)){$spoot_s_animation = "Rotate";}
?>

	<select id="spoot_s_animation" name="call_me_spoot_options[spoot_s_animation]">
	<?php if($spoot_s_animation==""){?><option value="Rotate">Rotate</option><?php }else{?><option selected value="<?php echo $spoot_s_animation; ?>"><?php echo $spoot_s_animation; ?></option><?php }?>
	<option disabled>---------</option>
	<option value="Rotate">Rotate</option>
	<option value="Grow" disabled>Grow (Pro version)</option>
	<option value="Shrink" disabled>Shrink (Pro version)</option>
	<option value="FadeIn" disabled>FadeIn (Pro version)</option>
	<option value="Swing" disabled>Swing (Pro version)</option>
	<option value="Tada" disabled>Tada (Pro version)</option>

</select>

<?php }

//show settings field
function call_me_spoot_icon_color_field() {
    $options = get_option('call_me_spoot_options');
    $spoot_s_icon_color = (isset($options['spoot_s_icon_color'])) ? $options['spoot_s_icon_color'] : '';
    $spoot_s_color = (isset($options['spoot_s_color'])) ? $options['spoot_s_color'] : '';
    $spoot_s_icon = (isset($options['spoot_s_icon'])) ? $options['spoot_s_icon'] : '';
	$spoot_s_border_color = (isset($options['spoot_s_border_color'])) ? $options['spoot_s_border_color'] : '';
    $spoot_s_animation = (isset($options['spoot_s_animation'])) ? $options['spoot_s_animation'] : '';
    if(empty($spoot_s_color)){$spoot_s_color = "#4682B4";}
    if(empty($spoot_s_icon_color)){$spoot_s_icon_color = "#ffffff";}
    if(empty($spoot_s_border_color)){$spoot_s_border_color = "#ffffff";}
    if(empty($spoot_s_icon)){$spoot_s_icon = "dashicons dashicons-phone";}
    if(empty($spoot_s_animation)){$spoot_s_animation = "Rotate";}

    $style_button = "background:".$spoot_s_color."; margin-top:40px; border-color:".$spoot_s_border_color."";


    $style_icon = "color: ".$spoot_s_icon_color.";";
?><div class="spoot_s_icon_color"><input type="color" id="spoot_s_icon_color" name="call_me_spoot_options[spoot_s_icon_color]" value="<?php echo $spoot_s_icon_color; ?>" style="width:50px;"></div><?php

echo''.spwp86_animation_button($spoot_s_animation).' <div class="spoot-button" style="'.$style_button.'"><span style="'.$style_icon.'" class="'.$spoot_s_icon.'" id="spoot-button-icon"></span></div>';

}

//register_post_type
add_action('init', 'spwp86_contact_form_init');
function spwp86_contact_form_init() {

	$labels = array(
		'name' => __('Call me spoot', 'spwp86_contact_form_plugin'),
		'singular_name' => __('New Form', 'spwp86_contact_form_plugin'),
		'add_new' => __('Add Form', 'spwp86_contact_form_plugin'),
		'add_new_item' => __('Add Form', 'spwp86_contact_form_plugin'),
		'edit_item' => __('Edit Form', 'spwp86_contact_form_plugin'),
		'new_item' => __('New Form', 'spwp86_contact_form_plugin'),
		'all_items' => __('All Forms', 'spwp86_contact_form_plugin'),
		'view_item' => __('View Form', 'spwp86_contact_form_plugin'),
		'search_items' => __('Search Forms', 'spwp86_contact_form_plugin'),
		'not_found' =>  __('No forms found', 'spwp86_contact_form_plugin'),
		'not_found_in_trash' => __('No forms found in Trash', 'spwp86_contact_form_plugin'),
		'menu_name' => __('Call me spoot', 'spwp86_contact_form_plugin')
	  );

	  $args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => '99',
		'menu_icon' => 'dashicons-email',
		'supports' => array('title', 'comments'),
		'rewrite' => false
	  );

	  register_post_type('spwp86_contact_form', $args);
}

//register the meta box
add_action('add_meta_boxes', 'spwp86_contact_form_register_meta_box');
function spwp86_contact_form_register_meta_box() {
	add_meta_box('spwp86-contact-form-meta', __( 'Settings','spwp86_contact_form-plugin' ), 'spwp86_contact_form_meta_box', 'spwp86_contact_form', 'normal', 'default' );
}

//meta box
function spwp86_contact_form_meta_box($post) {

	$spwp86_meta = get_spwp86_meta_box_data($post->ID);

	?>
	<div class="tabs">
		<input id="tab1" type="radio" name="tabs" checked>
		<label for="tab1" title="Customize form"><span class="dashicons dashicons-admin-tools"></span></label>

		<input id="tab2" type="radio" name="tabs">
		<label for="tab2" title="Notification"><span class="dashicons dashicons-admin-settings"></span></label>

		<input id="tab3" type="radio" name="tabs">
		<label for="tab3" title="Styling"><span class="dashicons dashicons-admin-appearance"></span></label>

		<input id="tab4" type="radio" name="tabs">
		<label for="tab4" title="Notification"><span class="dashicons dashicons-email-alt"></span></label>

		<section id="content1">
			<p><b><?php echo __('Field Settings', 'spwp86_contact_form_plugin');?></b></p>
			<table class="spwp86_setting_table">
				<tr class="spwp86_table_form_field_name_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Name', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_name">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_full_name_disable" name="spwp86_contact_form_full_name_disable" value="y" <?php if($spwp86_meta['full_name_disable']=="y"){echo "checked";}?> >
					</td>
				</tr>
				<tr class="spwp86_table_form_field_name">
					<td>
						<p><?php echo __('Required', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_full_name_required" name="spwp86_contact_form_full_name_required" value="y" <?php if($spwp86_meta['full_name_required']=="y"){echo "checked";}?>>
						<input type="hidden" id="spwp86_contact_form_full_name_required_flag" name="spwp86_contact_form_full_name_required_flag" value="n">
					</td>
				</tr>
				<tr class="spwp86_table_form_field_name">
					<td>
						<p><?php echo __('Label', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_lable_full_name" name="spwp86_contact_form_lable_full_name" value="<?php echo esc_attr($spwp86_meta['lable_full_name']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_field_name">
					<td>
						<p><?php echo __('Placeholder', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						 <input type="text" id="spwp86_contact_form_placeholder_full_name" name="spwp86_contact_form_placeholder_full_name" value="<?php echo esc_attr($spwp86_meta['placeholder_full_name']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_field_email_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('E-mail', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_email">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_email_disable" name="spwp86_contact_form_email_disable" value="y" <?php if($spwp86_meta['email_disable']=="y"){echo "checked";}?> <?php if($spwp86_meta['phone_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_email">
					<td>
						<p><?php echo __('Required', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_email_required" name="spwp86_contact_form_email_required" value="y" <?php if($spwp86_meta['email_required']=="y"){echo "checked";}?> <?php if($spwp86_meta['phone_disable']=="y"){echo "checked disabled";}?> <?php if($spwp86_meta['email_disable']=="y"){echo "disabled";}?>>
						<input type="hidden" id="spwp86_contact_form_email_required_flag" name="spwp86_contact_form_email_required_flag" value="n">
					</td>
				</tr>
				<tr class="spwp86_table_form_field_email">
					<td>
						<p><?php echo __('Label', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_lable_email" name="spwp86_contact_form_lable_email" value="<?php echo esc_attr($spwp86_meta['lable_email']); ?>" <?php if($spwp86_meta['email_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_email">
					<td>
						 <p><?php echo __('Placeholder', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_placeholder_email" name="spwp86_contact_form_placeholder_email" value="<?php echo esc_attr($spwp86_meta['placeholder_email']); ?>" <?php if($spwp86_meta['email_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Phone', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_phone_disable" name="spwp86_contact_form_phone_disable" value="y" <?php if($spwp86_meta['phone_disable']=="y"){echo "checked";}?> <?php if($spwp86_meta['email_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone">
					<td>
						<p><?php echo __('Required', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_phone_required" name="spwp86_contact_form_phone_required" value="y" <?php if($spwp86_meta['phone_required']=="y"){echo "checked";}?> <?php if($spwp86_meta['phone_disable']=="y"){echo "disabled";}?> <?php if($spwp86_meta['email_disable']=="y"){echo "checked disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone">
					<td>
						<p><?php echo __('Label', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_lable_phone" name="spwp86_contact_form_lable_phone" value="<?php echo esc_attr($spwp86_meta['lable_phone']); ?>" <?php if($spwp86_meta['phone_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone">
					<td>
						<p><?php echo __('Placeholder', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_placeholder_phone" name="spwp86_contact_form_placeholder_phone" value="<?php echo esc_attr($spwp86_meta['placeholder_phone']); ?>" <?php if($spwp86_meta['phone_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_phone">
					<td>
						<p><?php echo __('Mask', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_mask_phone" name="spwp86_contact_form_mask_phone" value="<?php echo esc_attr($spwp86_meta['mask_phone']); ?>" <?php if($spwp86_meta['phone_disable']=="y"){echo "disabled";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_message_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Message', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_message">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_message_disable" name="spwp86_contact_form_message_disable" value="y" <?php if($spwp86_meta['message_disable']=="y"){echo "checked";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_message">
					<td>
						<p><?php echo __('Required', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_message_required" name="spwp86_contact_form_message_required" value="y" <?php if($spwp86_meta['message_required']=="y"){echo "checked";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_field_message">
					<td>
						<p><?php echo __('Label', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_lable_message" name="spwp86_contact_form_lable_message" value="<?php echo esc_attr($spwp86_meta['lable_message']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_field_message">
					<td>
						<p><?php echo __('Placeholder', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_placeholder_message" name="spwp86_contact_form_placeholder_message" value="<?php echo esc_attr($spwp86_meta['placeholder_message']); ?>">
					</td>
				</tr>
			</table>
		</section>
		<section id="content2">
			<p><b><?php echo __('Form Settings', 'spwp86_contact_form_plugin');?></b></p>
			<table class="spwp86_setting_table">
				<tr class="spwp86_table_form_title_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Form title', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_title">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_header_disable" name="spwp86_contact_form_header_disable" value="y" <?php if($spwp86_meta['header_disable']=="y"){echo "checked";}?>>
					</td>
				</tr>
				<tr class="spwp86_table_form_title">
					<td>
						<p><?php echo __('Title', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_header" name="spwp86_contact_form_header" value="<?php echo esc_attr($spwp86_meta['header']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_button_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Submit', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_button">
					<td>
						<p><?php echo __('Text', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_lable_button" name="spwp86_contact_form_lable_button" value="<?php echo esc_attr($spwp86_meta['lable_button']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_success_text_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Success text', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_success_text">
					<td>
						<p><?php echo __('Text', 'spwp86_contact_form_plugin');?>:</p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_form_success_text" name="spwp86_contact_form_success_text" value="<?php echo esc_attr($spwp86_meta['success_text']); ?>">
					</td>
				</tr>
			</table>
		</section>
		<section id="content3">
			<p><b><?php echo __('Styles', 'spwp86_contact_form_plugin');?></b></p>
			<table class="spwp86_setting_table">
				<tr>
					<td>
						<a href="http://web-cude.com/" target="_blank">Pro Version</a>
						<input type="hidden" id="spwp86_contact_form_success_text_color" name="spwp86_contact_form_success_text_color" value="<?php echo esc_attr($spwp86_meta['success_text_color']); ?>">
						<input type="hidden" id="spwp86_contact_form_bgcolor" name="spwp86_contact_form_bgcolor" value="<?php echo $spwp86_meta['form_bgcolor']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_width" name="spwp86_contact_form_width" value="<?php echo $spwp86_meta['form_width']; ?>">
						<input type="hidden" id="spwp86_contact_form_border" name="spwp86_contact_form_border" value="<?php echo $spwp86_meta['form_border']; ?>">
						<input type="hidden" id="spwp86_contact_form_border_color" name="spwp86_contact_form_border_color" value="<?php echo $spwp86_meta['form_border_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_border_radius" name="spwp86_contact_form_border_radius" value="<?php echo $spwp86_meta['form_border_radius']; ?>">
						<input type="hidden" id="spwp86_contact_form_font_family" name="spwp86_contact_form_font_family" value="<?php echo $spwp86_meta['form_font_family']; ?>">
						<input type="hidden" id="spwp86_contact_form_header_bgcolor" name="spwp86_contact_form_header_bgcolor" value="<?php echo $spwp86_meta['header_bgcolor']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_header_font_color" name="spwp86_contact_form_header_font_color" value="<?php echo $spwp86_meta['header_font_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_header_font_size" name="spwp86_contact_form_header_font_size" value="<?php echo $spwp86_meta['header_font_size'];?>">
						<input type="hidden" id="spwp86_contact_form_header_text_align" name="spwp86_contact_form_header_text_align" value="<?php echo $spwp86_meta['header_text_align'];?>">			
						<input type="hidden" id="spwp86_contact_form_header_font_weight" name="spwp86_contact_form_header_font_weight" value="<?php echo $spwp86_meta['header_font_weight']; ?>">
						<input type="hidden" id="spwp86_contact_form_labels_font_color" name="spwp86_contact_form_labels_font_color" value="<?php echo $spwp86_meta['labels_font_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_labels_font_size" name="spwp86_contact_form_labels_font_size" value="<?php echo $spwp86_meta['labels_font_size'];?>">	
						<input type="hidden" id="spwp86_contact_form_labels_text_align" name="spwp86_contact_form_labels_text_align" value="<?php echo $spwp86_meta['labels_text_align'];?>">
						<input type="hidden" id="spwp86_contact_form_labels_font_weight" name="spwp86_contact_form_labels_font_weight" value="<?php echo $spwp86_meta['labels_font_weight'];?>">
						<input type="hidden" id="spwp86_contact_form_inputs_bgcolor" name="spwp86_contact_form_inputs_bgcolor" value="<?php echo $spwp86_meta['inputs_bgcolor']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_inputs_border_color" name="spwp86_contact_form_inputs_border_color" value="<?php echo $spwp86_meta['inputs_border_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_inputs_border_radius" name="spwp86_contact_form_inputs_border_radius" value="<?php echo $spwp86_meta['inputs_border_radius']; ?>">
						<input type="hidden" id="spwp86_contact_form_inputs_placeholder_color" name="spwp86_contact_form_inputs_placeholder_color" value="<?php echo $spwp86_meta['inputs_placeholder_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_inputs_error_color" name="spwp86_contact_form_inputs_error_color" value="<?php echo $spwp86_meta['inputs_error_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_inputs_required_color" name="spwp86_contact_form_inputs_required_color" value="<?php echo $spwp86_meta['inputs_required_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_button_align" name="spwp86_contact_form_button_align" value="<?php echo $spwp86_meta['submit_text_align']; ?>"></div>						
						<input type="hidden" id="spwp86_contact_form_button_bgcolor" name="spwp86_contact_form_button_bgcolor" value="<?php echo $spwp86_meta['submit_bgcolor']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_button_border" name="spwp86_contact_form_button_border" value="<?php echo $spwp86_meta['submit_border']; ?>">
						<input type="hidden" id="spwp86_contact_form_button_border_color" name="spwp86_contact_form_button_border_color" value="<?php echo $spwp86_meta['submit_border_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_button_border_radius" name="spwp86_contact_form_button_border_radius" value="<?php echo $spwp86_meta['submit_border_radius']; ?>">
						<input type="hidden" id="spwp86_contact_form_button_font_color" name="spwp86_contact_form_button_font_color" value="<?php echo $spwp86_meta['submit_font_color']; ?>"></div>
						<input type="hidden" id="spwp86_contact_form_button_font_weight" name="spwp86_contact_form_button_font_weight" value="<?php echo $spwp86_meta['submit_font_weight']; ?>">
						<input type="hidden" id="spwp86_contact_form_button_font_size" name="spwp86_contact_form_button_font_size" value="<?php echo $spwp86_meta['submit_font_size']; ?>">
					</td>
				</tr>
			</table>		
		</section>
		<section id="content4">
			<p><b><?php echo __('Notification', 'spwp86_contact_form_plugin');?></b></p>
			<table class="spwp86_setting_table">
				<tr class="spwp86_table_form_notification_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('E-mail notification', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>

				<tr class="spwp86_table_form_notification">
					<td>
						<p><?php echo __('Disable', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="checkbox" id="spwp86_contact_form_disable_email" name="spwp86_contact_form_disable_email" value="y" <?php if($spwp86_meta['spwp86_disable_email']=="y"){echo "checked";}?> >
					</td>
				</tr>
				<tr class="spwp86_table_form_notification">
					<td>
						<p><?php echo __('E-mail', 'spwp86_contact_form_plugin');?>: </p>
					</td>
					<td>
						<input type="text" id="spwp86_contact_send_email" name="spwp86_contact_send_email" value="<?php echo esc_attr($spwp86_meta['spwp86_send_email']); ?>">
					</td>
				</tr>
				<tr class="spwp86_table_form_notification_telegram_show">
					<td colspan="2" bgcolor="#f1f1f1">
						<p class="spwp86_setting_menu"><span class="dashicons dashicons-menu"></span><?php echo __('Telegram notification', 'spwp86_contact_form_plugin');?></p>
					</td>
				</tr>
				<tr class="spwp86_table_form_notification_telegram">
					<td>
                        <p><a href="http://web-cude.com/" target="_blank">Pro Version</a></p>
					</td>
					<td>

					</td>
				</tr>
			</table>
		</section>
	</div>
	</br>
<?php
	echo'<p style="font-size: 16px; margin-left:10px;">Short code form: <a href="http://web-cude.com/" target="_blank">Pro Version</a></p>';
	echo'<p style="font-size: 16px; margin-left:10px;">Short code link: <a href="http://web-cude.com/" target="_blank">Pro Version</a></p>';
	echo'<p style="font-size: 16px; margin-left:10px;">Short code button: <a href="http://web-cude.com/" target="_blank">Pro Version</a></p>';
	
	
	echo'<p style="font-size: 16px; margin-left:10px;"><a href="options-general.php?page=call_me_spoot" class="page-title-action">Customize button</a></b></p>';
	echo get_spwp86_contact_form($post, $post->ID);
}

//save meta box data
add_action( 'save_post','spwp86_contact_form_save_meta_box' );
function spwp86_contact_form_save_meta_box($post_id) {

	if (get_post_type($post_id) == 'spwp86_contact_form' && isset($_POST['spwp86_contact_form_header'])){

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		
		//Field Settings
		//disable
		update_post_meta($post_id, '_spwp86_contact_form_full_name_disable', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_full_name_disable'])));
		update_post_meta($post_id, '_spwp86_contact_form_email_disable', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_email_disable'])));
		update_post_meta($post_id, '_spwp86_contact_form_phone_disable', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_phone_disable'])));
		update_post_meta($post_id, '_spwp86_contact_form_message_disable', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_message_disable'])));
		//required
		update_post_meta($post_id, '_spwp86_contact_form_full_name_required', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_full_name_required'])));
		update_post_meta($post_id, '_spwp86_contact_form_full_name_required_flag', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_full_name_required_flag'])));
		update_post_meta($post_id, '_spwp86_contact_form_email_required', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_email_required'])));
		update_post_meta($post_id, '_spwp86_contact_form_email_required_flag', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_email_required_flag'])));
		update_post_meta($post_id, '_spwp86_contact_form_phone_required', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_phone_required'])));
		update_post_meta($post_id, '_spwp86_contact_form_message_required', spwp86_validate_data("1", "n",sanitize_key($_POST['spwp86_contact_form_message_required'])));
		//lables
		update_post_meta($post_id, '_spwp86_contact_form_header', spwp86_validate_data("60", "n", sanitize_text_field($_POST['spwp86_contact_form_header'])));
		update_post_meta($post_id, '_spwp86_contact_form_lable_full_name', spwp86_validate_data("75", "n", sanitize_text_field($_POST['spwp86_contact_form_lable_full_name'])));
		update_post_meta($post_id, '_spwp86_contact_form_lable_email', spwp86_validate_data("75", "n", sanitize_text_field($_POST['spwp86_contact_form_lable_email'])));
		update_post_meta($post_id, '_spwp86_contact_form_lable_phone', spwp86_validate_data("75", "n", sanitize_text_field($_POST['spwp86_contact_form_lable_phone'])));
		update_post_meta($post_id, '_spwp86_contact_form_lable_message', spwp86_validate_data("75", "n", sanitize_text_field($_POST['spwp86_contact_form_lable_message'])));
		update_post_meta($post_id, '_spwp86_contact_form_lable_button', spwp86_validate_data("75", "n", sanitize_text_field($_POST['spwp86_contact_form_lable_button'])));
		//placeholder
		update_post_meta($post_id, '_spwp86_contact_form_placeholder_full_name', spwp86_validate_data("65", "n", sanitize_text_field($_POST['spwp86_contact_form_placeholder_full_name'])));
		update_post_meta($post_id, '_spwp86_contact_form_placeholder_email', spwp86_validate_data("65", "n", sanitize_text_field($_POST['spwp86_contact_form_placeholder_email'])));
		update_post_meta($post_id, '_spwp86_contact_form_placeholder_phone', spwp86_validate_data("65", "n", sanitize_text_field($_POST['spwp86_contact_form_placeholder_phone'])));
		update_post_meta($post_id, '_spwp86_contact_form_placeholder_message', spwp86_validate_data("65", "n", sanitize_text_field($_POST['spwp86_contact_form_placeholder_message'])));

		//Form Settings
		update_post_meta($post_id, '_spwp86_contact_form_mask_phone', spwp86_validate_data("30", "n", sanitize_text_field($_POST['spwp86_contact_form_mask_phone'])));
		update_post_meta($post_id, '_spwp86_contact_form_success_text', spwp86_validate_data("200", "n", sanitize_text_field($_POST['spwp86_contact_form_success_text'])));
		update_post_meta($post_id, '_spwp86_contact_form_success_text_color', spwp86_validate_data("7", "n",sanitize_text_field($_POST['spwp86_contact_form_success_text_color'])));

		//Styles
		//Form
		update_post_meta($post_id, '_spwp86_contact_form_bgcolor', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_bgcolor'])));
		update_post_meta($post_id, '_spwp86_contact_form_width', spwp86_validate_data("4", "y", sanitize_key($_POST['spwp86_contact_form_width'])));
		update_post_meta($post_id, '_spwp86_contact_form_border', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_border'])));
		update_post_meta($post_id, '_spwp86_contact_form_border_color', spwp86_validate_data("7", "n",sanitize_text_field($_POST['spwp86_contact_form_border_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_border_radius', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_border_radius'])));
		update_post_meta($post_id, '_spwp86_contact_form_font_family', spwp86_validate_data("150", "n", esc_html($_POST['spwp86_contact_form_font_family'])));
		//Header
		update_post_meta($post_id, '_spwp86_contact_form_header_disable', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_header_disable'])));
		update_post_meta($post_id, '_spwp86_contact_form_header_bgcolor', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_header_bgcolor'])));
		update_post_meta($post_id, '_spwp86_contact_form_header_font_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_header_font_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_header_font_size', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_header_font_size'])));
		update_post_meta($post_id, '_spwp86_contact_form_header_text_align', spwp86_validate_data("7", "n", sanitize_key($_POST['spwp86_contact_form_header_text_align'])));
		update_post_meta($post_id, '_spwp86_contact_form_header_font_weight', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_header_font_weight'])));
		//Labels
		update_post_meta($post_id, '_spwp86_contact_form_labels_font_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_labels_font_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_labels_font_size', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_labels_font_size'])));
		update_post_meta($post_id, '_spwp86_contact_form_labels_text_align', spwp86_validate_data("7", "n", sanitize_key($_POST['spwp86_contact_form_labels_text_align'])));
		update_post_meta($post_id, '_spwp86_contact_form_labels_font_weight', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_labels_font_weight'])));
		//Inputs
		update_post_meta($post_id, '_spwp86_contact_form_inputs_bgcolor', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_inputs_bgcolor'])));
		update_post_meta($post_id, '_spwp86_contact_form_inputs_border_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_inputs_border_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_inputs_border_radius', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_inputs_border_radius'])));
		update_post_meta($post_id, '_spwp86_contact_form_inputs_placeholder_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_inputs_placeholder_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_inputs_error_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_inputs_error_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_inputs_required_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_inputs_required_color'])));
		//Submit
		update_post_meta($post_id, '_spwp86_contact_form_button_align', spwp86_validate_data("7", "n", sanitize_key($_POST['spwp86_contact_form_button_align'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_bgcolor', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_button_bgcolor'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_border', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_button_border'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_border_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_button_border_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_border_radius', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_button_border_radius'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_font_color', spwp86_validate_data("7", "n", sanitize_text_field($_POST['spwp86_contact_form_button_font_color'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_font_weight', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_button_font_weight'])));
		update_post_meta($post_id, '_spwp86_contact_form_button_font_size', spwp86_validate_data("3", "y", sanitize_key($_POST['spwp86_contact_form_button_font_size'])));

		//Notification
		//email
		update_post_meta($post_id, '_spwp86_contact_send_email', spwp86_validate_data("200", "n", sanitize_email($_POST['spwp86_contact_send_email'])));
		update_post_meta($post_id, '_spwp86_contact_form_disable_email', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_disable_email'])));

		//telegram
		update_post_meta($post_id, '_spwp86_contact_form_bot_token', spwp86_validate_data("150", "n", sanitize_text_field($_POST['spwp86_contact_form_bot_token'])));
		update_post_meta($post_id, '_spwp86_contact_form_chat_id', spwp86_validate_data("100", "n", sanitize_text_field($_POST['spwp86_contact_form_chat_id'])));
		update_post_meta($post_id, '_spwp86_contact_form_disable_telegram', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_disable_telegram'])));
		update_post_meta($post_id, '_spwp86_contact_form_disable_telegram_flag', spwp86_validate_data("1", "n", sanitize_key($_POST['spwp86_contact_form_disable_telegram_flag'])));
	}
}
