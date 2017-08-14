<?php

//Show feedback button
add_action('wp_footer', 'spoot_footer_notice');
function spoot_footer_notice(){
	global $post;
	$options = get_option('call_me_spoot_options');
	$spoot_s_enable_button = $options['spoot_s_enable_button'];

	if($spoot_s_enable_button=='y'){

		if(!empty($options['spoot_s_forms'])){$spoot_s_form_id = $options['spoot_s_forms'];} else {$spoot_s_form_id = " ";}
		if(!empty($options['spoot_s_position'])){$spoot_s_position = $options['spoot_s_position'];} else {$spoot_s_position = "right";}
		if(!empty($options['spoot_s_bottom'])){$spoot_s_bottom = $options['spoot_s_bottom'];} else {$spoot_s_bottom= "20";}
		if(!empty($options['spoot_s_left'])){$spoot_s_left = $options['spoot_s_left'];} else {$spoot_s_left = "20";}
		if(!empty($options['spoot_s_right'])){$spoot_s_right = $options['spoot_s_right'];} else {$spoot_s_right = "20";}
		if(!empty($options['spoot_s_color'])){$spoot_s_color = $options['spoot_s_color'];} else {$spoot_s_color = "#4682B4";}
		if(!empty($options['spoot_s_icon_color'])){$spoot_s_icon_color = $options['spoot_s_icon_color'];} else {$spoot_s_icon_color = "#ffffff";}
		if(!empty($options['spoot_s_border_color'])){$spoot_s_border_color = $options['spoot_s_border_color'];} else {$spoot_s_border_color = "#ffffff";}
		if(!empty($options['spoot_s_icon'])){$spoot_s_style_icon  = $options['spoot_s_icon'];} else {$spoot_s_style_icon  = "dashicons dashicons-phone";}
		if(!empty($options['spoot_s_animation'])){$spoot_s_animation = $options['spoot_s_animation'];} else {$spoot_s_animation  = "Rotate";}
		if(!empty($options['spoot_s_enable_mobile'])){$spoot_s_enable_mobile = $options['spoot_s_enable_mobile'];} else {$spoot_s_enable_mobile  = "";}

		if($spoot_s_position=="left"){
		?>
			<style>
				.spoot-button {
					position: fixed;
					bottom: <?php echo $spoot_s_bottom; ?>px;
					left: <?php echo $spoot_s_left; ?>px;
					background: <?php echo $spoot_s_color; ?>;
					border-color:<?php echo $spoot_s_border_color; ?>;
				}
			</style>
		<?php
		}
		if($spoot_s_position=="right"){
		?>
			<style>
				.spoot-button {
					position: fixed;
					bottom: <?php echo $spoot_s_bottom; ?>px;
					right: <?php echo $spoot_s_right; ?>px;
					background: <?php echo $spoot_s_color; ?>;
					border-color:<?php echo $spoot_s_border_color; ?>;

				}
			</style>
		<?php
		}
		?>
			<style>
				#spoot-button-icon{
					color: <?php echo $spoot_s_icon_color; ?>;
				}
			</style>
		<?php

		echo'<div class="spoot_overlay" title="call_me_spoot"></div><div class="spoot_popup"><div class="spoot_close_window"><span class="dashicons dashicons-no-alt" id="spoot_close_window"></span></div>';
		echo get_spwp86_contact_form($post, $spoot_s_form_id);
		echo'</div>';
		echo''.spwp86_animation_button($spoot_s_animation).'<div class="spoot-button"><a class="spoot_open_window" href=""><span class="'.$spoot_s_style_icon.'" id="spoot-button-icon"></span></a></div>';
	}
}
