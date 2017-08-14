<?php

//validate_data
function spwp86_validate_data($spwp86_count, $spwp86_number, $spwp86_data){

	if($spwp86_number=="y"){
		$spwp86_data=preg_replace('/[^0-9]/', '', $spwp86_data);
	}

	if(strlen($spwp86_data)>$spwp86_count){
		$spwp86_data_len=strlen($spwp86_data)-$spwp86_count;
		$spwp86_data= substr($spwp86_data, 0, -$spwp86_data_len);
	}

	return $spwp86_data;

}

//animation button
function spwp86_animation_button($animation_type){

		if($animation_type == "Rotate"){
		$add_animation_button = '
			<style>
				@-webkit-keyframes swing {
				  20% {-webkit-transform: rotate3d(0, 0, 1, 15deg);}
				  40% {-webkit-transform: rotate3d(0, 0, 1, -10deg);}
				  60% {-webkit-transform: rotate3d(0, 0, 1, 5deg);}
				  80% {-webkit-transform: rotate3d(0, 0, 1, -5deg);}
				  100% {-webkit-transform: rotate3d(0, 0, 1, 0deg);}
				}

				@-moz-keyframes swing {
				  20% {-moz-transform: rotate3d(0, 0, 1, 15deg);}
				  40% {-moz-transform: rotate3d(0, 0, 1, -10deg);}
				  60% {-moz-transform: rotate3d(0, 0, 1, 5deg);}
				  80% {-moz-transform: rotate3d(0, 0, 1, -5deg);}
				  100% {-moz-transform: rotate3d(0, 0, 1, 0deg);}
				}

				@-o-keyframes swing {
				  20% {-o-transform: rotate3d(0, 0, 1, 15deg);}
				  40% {-o-transform: rotate3d(0, 0, 1, -10deg);}
				  60% {-o-transform: rotate3d(0, 0, 1, 5deg);}
				  80% {-o-transform: rotate3d(0, 0, 1, -5deg);}
				  100% {-o-transform: rotate3d(0, 0, 1, 0deg);}
				}

				@keyframes swing {
				  20% {transform: rotate3d(0, 0, 1, 15deg);}
				  40% {transform: rotate3d(0, 0, 1, -10deg);}
				  60% {transform: rotate3d(0, 0, 1, 5deg);}
				  80% {transform: rotate3d(0, 0, 1, -5deg);}
				  100% {transform: rotate3d(0, 0, 1, 0deg);}
				}

				.spoot-button:hover{
					-webkit-animation-duration: 1s;
					-moz-animation-duration: 1s;
					-o-animation-duration: 1s;
					animation-duration: 1s;

					-webkit-transform-origin: center center;
					-moz-transform-origin: center center;
					-o-transform-origin: center center;
					transform-origin: center center;
					-webkit-animation-name: swing;
					-moz-animation-name: swing;
					-o-animation-name: swing;
					animation-name: swing;
				}
			</style>
		';
	}

	 return $add_animation_button;

}

//meta box data, field settings
function get_spwp86_meta_box_data($id){

	//disable
	$spwp86_meta['full_name_disable'] = get_post_meta($id, '_spwp86_contact_form_full_name_disable', true);
	if(empty($spwp86_meta['full_name_disable'])){$spwp86_meta['full_name_disable']="n";}

	$spwp86_meta['email_disable'] = get_post_meta($id, '_spwp86_contact_form_email_disable', true);
	if(empty($spwp86_meta['email_disable'])){$spwp86_meta['email_disable']="n";}

	$spwp86_meta['phone_disable'] = get_post_meta($id, '_spwp86_contact_form_phone_disable', true);
	if(empty($spwp86_meta['phone_disable'])){$spwp86_meta['phone_disable']="n";}

	$spwp86_meta['message_disable'] = get_post_meta($id, '_spwp86_contact_form_message_disable', true);
	if(empty($spwp86_meta['message_disable'])){$spwp86_meta['message_disable']="n";}

	//required
	$spwp86_meta['full_name_required'] = get_post_meta($id, '_spwp86_contact_form_full_name_required', true);

	$spwp86_meta['full_name_required_flag'] = get_post_meta($id, '_spwp86_contact_form_full_name_required_flag', true);

	if($spwp86_meta['full_name_required_flag']=='n'){$spwp86_meta['full_name_required'] = "y";} else {$spwp86_meta['full_name_required'] = "n";}
	if(empty($spwp86_meta['full_name_required_flag'])){$spwp86_meta['full_name_required']="y";}

	$spwp86_meta['email_required'] = get_post_meta($id, '_spwp86_contact_form_email_required', true);

	$spwp86_meta['email_required_flag'] = get_post_meta($id, '_spwp86_contact_form_email_required_flag', true);

	if($spwp86_meta['email_required_flag']=='n'){$spwp86_meta['email_required_required'] = "y";} else {$spwp86_meta['email_required'] = "n";}
	if(empty($spwp86_meta['email_required_flag'])){$spwp86_meta['email_required']="y";}

	$spwp86_meta['phone_required'] = get_post_meta($id, '_spwp86_contact_form_phone_required', true);
	if(empty($spwp86_meta['phone_required'])){$spwp86_meta['phone_required']="n";}

	$spwp86_meta['message_required'] = get_post_meta($id, '_spwp86_contact_form_message_required', true);
	if(empty($spwp86_meta['message_required'])){$spwp86_meta['message_required']="n";}

	//lables
	$spwp86_meta['lable_full_name'] = get_post_meta($id, '_spwp86_contact_form_lable_full_name', true);
	if(empty($spwp86_meta['lable_full_name'])){$spwp86_meta['lable_full_name']="Name";}

	$spwp86_meta['lable_email'] = get_post_meta($id, '_spwp86_contact_form_lable_email', true);
	if(empty($spwp86_meta['lable_email'])){$spwp86_meta['lable_email']="E-mail";}

	$spwp86_meta['lable_phone'] = get_post_meta($id, '_spwp86_contact_form_lable_phone', true);
	if(empty($spwp86_meta['lable_phone'])){$spwp86_meta['lable_phone']="Phone";}

	$spwp86_meta['lable_message'] = get_post_meta($id, '_spwp86_contact_form_lable_message', true);
	if(empty($spwp86_meta['lable_message'])){$spwp86_meta['lable_message']="Message";}

	$spwp86_meta['lable_button'] = get_post_meta($id, '_spwp86_contact_form_lable_button', true);
	if(empty($spwp86_meta['lable_button'])){$spwp86_meta['lable_button']="Send";}

	//placeholder
	$spwp86_meta['placeholder_full_name'] = get_post_meta($id, '_spwp86_contact_form_placeholder_full_name', true);
	if(empty($spwp86_meta['placeholder_full_name'])){$spwp86_meta['placeholder_full_name']="Complete this field";}

	$spwp86_meta['placeholder_email'] = get_post_meta($id, '_spwp86_contact_form_placeholder_email', true);
	if(empty($spwp86_meta['placeholder_email'])){$spwp86_meta['placeholder_email']="Complete this field";}

	$spwp86_meta['placeholder_phone'] = get_post_meta($id, '_spwp86_contact_form_placeholder_phone', true);
	if(empty($spwp86_meta['placeholder_phone'])){$spwp86_meta['placeholder_phone']="Complete this field";}

	$spwp86_meta['placeholder_message'] = get_post_meta($id, '_spwp86_contact_form_placeholder_message', true);
	if(empty($spwp86_meta['placeholder_message'])){$spwp86_meta['placeholder_message']="Complete this field";}

    //Form Settings
	$spwp86_meta['header'] = get_post_meta($id, '_spwp86_contact_form_header', true);
	if(empty($spwp86_meta['header'])){$spwp86_meta['header']="Contact form";}

	$spwp86_meta['mask_phone'] = get_post_meta($id, '_spwp86_contact_form_mask_phone', true);
	if(empty($spwp86_meta['mask_phone'])){$spwp86_meta['mask_phone']="+00(000)000-00-00";}

	$spwp86_meta['success_text'] = get_post_meta($id, '_spwp86_contact_form_success_text', true);
	if(empty($spwp86_meta['success_text'])){$spwp86_meta['success_text']="Thank you!";}

	$spwp86_meta['success_text_color'] = get_post_meta($id, '_spwp86_contact_form_success_text_color', true);
	if(empty($spwp86_meta['success_text_color'])){$spwp86_meta['success_text_color']="#249000";}

    //Styles

	//Form
	$spwp86_meta['form_bgcolor'] = get_post_meta($id, '_spwp86_contact_form_bgcolor', true);
	if(empty($spwp86_meta['form_bgcolor'])){$spwp86_meta['form_bgcolor']="#ffffff";}

	$spwp86_meta['form_width'] = get_post_meta($id, '_spwp86_contact_form_width', true);
	if(empty($spwp86_meta['form_width'])){$spwp86_meta['form_width']="500";}

	$spwp86_meta['form_border'] = get_post_meta($id, '_spwp86_contact_form_border', true);
	if(empty($spwp86_meta['form_border'] )){$spwp86_meta['form_border']="1";}

	$spwp86_meta['form_border_color'] = get_post_meta($id, '_spwp86_contact_form_border_color', true);
	if(empty($spwp86_meta['form_border_color'])){$spwp86_meta['form_border_color']="#cfcfcf";}

	$spwp86_meta['form_border_radius'] = get_post_meta($id, '_spwp86_contact_form_border_radius', true);
	if(empty($spwp86_meta['form_border_radius'])){$spwp86_meta['form_border_radius']="2";}

	$spwp86_meta['form_font_family'] = get_post_meta($id, '_spwp86_contact_form_font_family', true);
	if(empty($spwp86_meta['form_font_family'])){$spwp86_meta['form_font_family']="'Open Sans',sans-serif";}

	//Form Heading
	$spwp86_meta['header_disable'] = get_post_meta($id, '_spwp86_contact_form_header_disable', true);
	if(empty($spwp86_meta['header_disable'])){$spwp86_meta['header_disable']="n";}

	$spwp86_meta['header_bgcolor'] = get_post_meta($id, '_spwp86_contact_form_header_bgcolor', true);
	if(empty($spwp86_meta['header_bgcolor'])){$spwp86_meta['header_bgcolor']="#f3f3f3";}

	$spwp86_meta['header_font_color'] = get_post_meta($id, '_spwp86_contact_form_header_font_color', true);
	if(empty($spwp86_meta['header_font_color'])){$spwp86_meta['header_font_color']="#555555";}

	$spwp86_meta['header_font_size'] = get_post_meta($id, '_spwp86_contact_form_header_font_size', true);
	if(empty($spwp86_meta['header_font_size'])){$spwp86_meta['header_font_size']="20";}

	$spwp86_meta['header_text_align'] = get_post_meta($id, '_spwp86_contact_form_header_text_align', true);
	if(empty($spwp86_meta['header_text_align'])){$spwp86_meta['header_text_align']="center";}

	$spwp86_meta['header_font_weight'] = get_post_meta($id, '_spwp86_contact_form_header_font_weight', true);
	if(empty($spwp86_meta['header_font_weight'])){$spwp86_meta['header_font_weight']="600";}

	//Labels
	$spwp86_meta['labels_font_color'] = get_post_meta($id, '_spwp86_contact_form_labels_font_color', true);
	if(empty($spwp86_meta['labels_font_color'])){$spwp86_meta['labels_font_color']="#666666";}

	$spwp86_meta['labels_font_size'] =  get_post_meta($id, '_spwp86_contact_form_labels_font_size', true);
	if(empty($spwp86_meta['labels_font_size'])){$spwp86_meta['labels_font_size']="15";}

	$spwp86_meta['labels_text_align'] = get_post_meta($id, '_spwp86_contact_form_labels_text_align', true);
	if(empty($spwp86_meta['labels_text_align'])){$spwp86_meta['labels_text_align']="left";}

	$spwp86_meta['labels_font_weight'] = get_post_meta($id, '_spwp86_contact_form_labels_font_weight', true);
	if(empty($spwp86_meta['labels_font_weight'])){$spwp86_meta['labels_font_weight']="600";}

	//Inputs
	$spwp86_meta['inputs_bgcolor'] =  get_post_meta($id, '_spwp86_contact_form_inputs_bgcolor', true);
	if(empty($spwp86_meta['inputs_bgcolor'])){$spwp86_meta['inputs_bgcolor']="#ffffff";}

	$spwp86_meta['inputs_border_color'] =  get_post_meta($id, '_spwp86_contact_form_inputs_border_color', true);
	if(empty($spwp86_meta['inputs_border_color'])){$spwp86_meta['inputs_border_color']="#cfcfcf";}

	$spwp86_meta['inputs_border_radius'] = get_post_meta($id, '_spwp86_contact_form_inputs_border_radius', true);
	if(empty($spwp86_meta['inputs_border_radius'])){$spwp86_meta['inputs_border_radius']="3";}

	$spwp86_meta['inputs_placeholder_color'] = get_post_meta($id, '_spwp86_contact_form_inputs_placeholder_color', true);
	if(empty($spwp86_meta['inputs_placeholder_color'])){$spwp86_meta['inputs_placeholder_color']="#cdcdcd";}

	$spwp86_meta['inputs_error_color'] = get_post_meta($id, '_spwp86_contact_form_inputs_error_color', true);
	if(empty($spwp86_meta['inputs_error_color'])){$spwp86_meta['inputs_error_color']="#fff0f0";}

	$spwp86_meta['inputs_required_color'] = get_post_meta($id, '_spwp86_contact_form_inputs_required_color', true);
	if(empty($spwp86_meta['inputs_required_color'])){$spwp86_meta['inputs_required_color']="#F08080";}

	//Submit
	$spwp86_meta['submit_text_align'] = get_post_meta($id, '_spwp86_contact_form_button_align', true);
	if(empty($spwp86_meta['submit_text_align'])){$spwp86_meta['submit_text_align']="left";}

	$spwp86_meta['submit_bgcolor'] = get_post_meta($id, '_spwp86_contact_form_button_bgcolor', true);
	if(empty($spwp86_meta['submit_bgcolor'])){$spwp86_meta['submit_bgcolor']="#f3f3f3";}

	$spwp86_meta['submit_border'] = get_post_meta($id, '_spwp86_contact_form_button_border', true);
	if(empty($spwp86_meta['submit_border'])){$spwp86_meta['submit_border']="1";}

	$spwp86_meta['submit_border_color'] =  get_post_meta($id, '_spwp86_contact_form_button_border_color', true);
	if(empty($spwp86_meta['submit_border_color'])){$spwp86_meta['submit_border_color']="#cfcfcf";}

	$spwp86_meta['submit_border_radius'] = get_post_meta($id, '_spwp86_contact_form_button_border_radius', true);
	if(empty($spwp86_meta['submit_border_radius'])){$spwp86_meta['submit_border_radius']="2";}

	$spwp86_meta['submit_font_color'] = get_post_meta($id, '_spwp86_contact_form_button_font_color', true);
	if(empty($spwp86_meta['submit_font_color'])){$spwp86_meta['submit_font_color']="#555555";}

	$spwp86_meta['submit_font_weight'] = get_post_meta($id, '_spwp86_contact_form_button_font_weight', true);
	if(empty($spwp86_meta['submit_font_weight'])){$spwp86_meta['submit_font_weight']="600";}

	$spwp86_meta['submit_font_size'] = get_post_meta($id, '_spwp86_contact_form_button_font_size', true);
	if(empty($spwp86_meta['submit_font_size'])){$spwp86_meta['submit_font_size']="14";}

    //Notification

	//email
	$spwp86_meta['spwp86_send_email'] = get_post_meta($id, '_spwp86_contact_send_email', true);
	if(empty($spwp86_meta['spwp86_send_email'])){$spwp86_meta['spwp86_send_email'] = get_option('admin_email');}

	$spwp86_meta['spwp86_disable_email'] = get_post_meta($id, '_spwp86_contact_form_disable_email', true);

	//telegram
	$spwp86_meta['spwp86_disable_telegram'] = get_post_meta($id, '_spwp86_contact_form_disable_telegram', true);
	$spwp86_meta['spwp86_disable_telegram_flag'] = get_post_meta($id, '_spwp86_contact_form_disable_telegram_flag', true);

	if(empty($spwp86_meta['spwp86_disable_telegram_flag'])){$spwp86_meta['spwp86_disable_telegram']="y";}
	if($spwp86_meta['spwp86_disable_telegram_flag']=='n'){$spwp86_meta['spwp86_disable_telegram'] = "n";} else {$spwp86_meta['spwp86_disable_telegram'] = "y";}


	$spwp86_meta['spwp86_bot_token'] = get_post_meta($id, '_spwp86_contact_form_bot_token', true);
	$spwp86_meta['spwp86_chat_id'] = get_post_meta($id, '_spwp86_contact_form_chat_id', true);

	return $spwp86_meta;
}

//contact form
function get_spwp86_contact_form($post,$id){
	$spwp86_meta = get_spwp86_meta_box_data($id);

	$style_header_border_radius = $spwp86_meta['form_border_radius']-2;

	if($spwp86_meta['header_disable']=="y"){$header_display = "display: none;";}else{$header_display = "display: block;";}

	$style_placeholder = "
		<style>
		#spwp86_contact_form_".$id." input::-webkit-input-placeholder {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." input::-moz-placeholder          {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." input:-moz-placeholder           {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." input:-ms-input-placeholder      {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}

		#spwp86_contact_form_".$id." textarea::-webkit-input-placeholder {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." textarea::-moz-placeholder          {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." textarea:-moz-placeholder           {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}
		#spwp86_contact_form_".$id." textarea:-ms-input-placeholder      {color:".$spwp86_meta['inputs_placeholder_color']."!important; font-size: ".$spwp86_meta['labels_font_size']."px; font-family:".$spwp86_meta['form_font_family'].";}

		.spoot_popup{width:".$spwp86_meta['form_width'] ."px; border-radius:".$spwp86_meta['form_border_radius']."px;}

		</style>
	";

	$style_form = "background: ".$spwp86_meta['form_bgcolor']."; max-width: ".$spwp86_meta['form_width']."px; border: ".$spwp86_meta['form_border']."px solid; border-color: ".$spwp86_meta['form_border_color']."; border-radius: ".$spwp86_meta['form_border_radius']."px; font-family:".$spwp86_meta['form_font_family'].";";
	$style_header = "background: ".$spwp86_meta['header_bgcolor']."; color: ".$spwp86_meta['header_font_color']."; font-size: ".$spwp86_meta['header_font_size']."px; border-radius: ".$style_header_border_radius."px ".$style_header_border_radius."px 0px 0px; border-bottom: ".$spwp86_meta['form_border']."px solid; border-color: ".$spwp86_meta['form_border_color']."; text-align: ".$spwp86_meta['header_text_align'] ."; font-weight: ".$spwp86_meta['header_font_weight']."; ".$header_display."; font-family:".$spwp86_meta['form_font_family'].";";
	$style_lables = "color: ".$spwp86_meta['labels_font_color']."; font-size: ".$spwp86_meta['labels_font_size']."px; font-weight: ".$spwp86_meta['labels_font_weight']."; font-family:".$spwp86_meta['form_font_family'].";";
	$style_inputs = "color: ".$spwp86_meta['labels_font_color']."; background: ".$spwp86_meta['inputs_bgcolor']."; border-color: ".$spwp86_meta['inputs_border_color']."; border-radius: ".$spwp86_meta['inputs_border_radius']."px; font-family:".$spwp86_meta['form_font_family'].";";
	$style_submit = "background: ".$spwp86_meta['submit_bgcolor']."; border: ".$spwp86_meta['submit_border']."px solid; border-color: ".$spwp86_meta['submit_border_color']."; border-radius: ".$spwp86_meta['submit_border_radius']."px; color: ".$spwp86_meta['submit_font_color']."; font-weight: ".$spwp86_meta['submit_font_weight']."; font-family:".$spwp86_meta['form_font_family']."; font-size:".$spwp86_meta['submit_font_size']."px;";
	$style_msg = "text-align: center;  font-size: ".$spwp86_meta['labels_font_size']."px; color: ".$spwp86_meta['success_text_color']."; font-family:".$spwp86_meta['form_font_family'].";";

		$get_spwp86_contact_form = '
		'.$style_placeholder.'
		<form action="#" enctype="multipart/form-data" id="spwp86_contact_form_'.$id.'">
			<div class="spwp86_contact_form" id="spwp86_contact_form_'.$id.'" style="'.$style_form.'">
			 <h1 id="spwp86_header" style="'.$style_header.'">'.$spwp86_meta['header'].'</h1>';

				//spwp86_name
				$get_spwp86_contact_form.='
				<p id="spwp86_label" class="spwp86_full_name" style="
				';

				if ($spwp86_meta['full_name_disable']=="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.='text-align:'.$spwp86_meta['labels_text_align'].';">';

				$get_spwp86_contact_form.='<span id="spwp86_full_name_required" style="';
				if($spwp86_meta['full_name_required']!="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.=	' font-size: '.$spwp86_meta['labels_font_size'].'px; color: '.$spwp86_meta['inputs_required_color'].'">*</span><span style="'.$style_lables.'" class="spwp86_lable_full_name_'.$id.'" id="spwp86_lable_full_name">'.$spwp86_meta['lable_full_name'].'</span></br>
				<input style="'.$style_inputs.'" type="text" class="spwp86_full_name_'.$id.'" id="spwp86_full_name" name="spwp86_full_name" value="" placeholder="'.$spwp86_meta['placeholder_full_name'].'"></p>';

				//spwp86_email
				$get_spwp86_contact_form.='
				<p id="spwp86_label" class="spwp86_lable_email" style="
				';

				if ($spwp86_meta['email_disable']=="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.='text-align:'.$spwp86_meta['labels_text_align'].';">';

				$get_spwp86_contact_form.='<span id="spwp86_email_required" style="';
				if($spwp86_meta['email_required']!="y" && $spwp86_meta['phone_disable']!="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.=	'font-size: '.$spwp86_meta['labels_font_size'].'px; color: '.$spwp86_meta['inputs_required_color'].'">*</span><span style="'.$style_lables.'" class="spwp86_lable_email_'.$id.'" id="spwp86_lable_email">'.$spwp86_meta['lable_email'].'</span></br>
				<input style="'.$style_inputs.'" type="text" class="spwp86_email_'.$id.'" id="spwp86_email" name="spwp86_email" value="" placeholder="'.$spwp86_meta['placeholder_email'].'"></p>';


				//spwp86_phone
				$get_spwp86_contact_form.='
				<p id="spwp86_label" class="spwp86_lable_phone" style="
				';

				if ($spwp86_meta['phone_disable']=="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.='text-align:'.$spwp86_meta['labels_text_align'].';">';

				$get_spwp86_contact_form.='<span id="spwp86_phone_required" style="';
				if($spwp86_meta['phone_required']!="y" && $spwp86_meta['email_disable']!="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.=	'font-size: '.$spwp86_meta['labels_font_size'].'px; color: '.$spwp86_meta['inputs_required_color'].'">*</span><span style="'.$style_lables.'" class="spwp86_lable_phone_'.$id.'" id="spwp86_lable_phone">'.$spwp86_meta['lable_phone'].'</span></br>
				<input style="'.$style_inputs.'" type="text" class="spwp86_phone_'.$id.'" id="spwp86_phone" name="spwp86_phone" value="" placeholder="'.$spwp86_meta['placeholder_phone'].'"></p>';

				//spwp86_message
				$get_spwp86_contact_form.='
				<p id="spwp86_label" class="spwp86_lable_message" style="
				';

				if ($spwp86_meta['message_disable']=="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.='text-align:'.$spwp86_meta['labels_text_align'].';">';

				$get_spwp86_contact_form.='<span id="spwp86_message_required" style="';
				if($spwp86_meta['message_required']!="y"){
					$get_spwp86_contact_form.= 'display: none;';
				}

				$get_spwp86_contact_form.= ' font-size: '.$spwp86_meta['labels_font_size'].'px; color: '.$spwp86_meta['inputs_required_color'].'">*</span><span style="'.$style_lables.'" class="spwp86_lable_message_'.$id.'" id="spwp86_lable_message">'.$spwp86_meta['lable_message'].'</span></br>';
				$get_spwp86_contact_form.= '<textarea style="'.$style_inputs.'"; class="spwp86_message_'.$id.'" id="spwp86_message" name="spwp86_message" placeholder="'.$spwp86_meta['placeholder_message'].'"></textarea></p>';

				if($spwp86_meta['email_disable'] =='y'){$spwp86_meta['phone_required']='y';}
				if($spwp86_meta['phone_disable'] =='y'){$spwp86_meta['email_required']='y';}

				$get_spwp86_contact_form.= '
				<p><input class="spwp86_bot_token_'.$id.'" type="hidden" value="'.$spwp86_meta['spwp86_bot_token'].'"></p>
				<p><input class="spwp86_chat_id_'.$id.'" type="hidden" value="'.$spwp86_meta['spwp86_chat_id'].'"></p>
				<p><input class="spwp86_disable_telegram_'.$id.'" type="hidden" value="'.$spwp86_meta['spwp86_disable_telegram'].'"></p>
				<p><input class="spwp86_disable_email_'.$id.'" type="hidden" value="'.$spwp86_meta['spwp86_disable_email'].'"></p>

				<p><input class="spwp86_phone_mask_'.$id.'" type="hidden" value="'.$spwp86_meta['mask_phone'].'"></p>
				<p><input class="spwp86_success_text_'.$id.'" type="hidden" value="'.$spwp86_meta['success_text'].'"></p>

				<p><input class="spwp86_required_full_name_'.$id.'" type="hidden" value="'.$spwp86_meta['full_name_required'].'"></p>
				<p><input class="spwp86_required_email_'.$id.'" type="hidden" value="'.$spwp86_meta['email_required'].'"></p>
				<p><input class="spwp86_required_phone_'.$id.'" type="hidden" value="'.$spwp86_meta['phone_required'].'"></p>
				<p><input class="spwp86_required_message_'.$id.'" type="hidden" value="'.$spwp86_meta['message_required'].'"></p>

				<p><input class="spwp86_disable_full_name_'.$id.'" type="hidden" value="'.$spwp86_meta['full_name_disable'].'"></p>
				<p><input class="spwp86_disable_email_'.$id.'" type="hidden" value="'.$spwp86_meta['email_disable'].'"></p>
				<p><input class="spwp86_disable_phone_'.$id.'" type="hidden" value="'.$spwp86_meta['phone_disable'].'"></p>
				<p><input class="spwp86_disable_message_'.$id.'" type="hidden" value="'.$spwp86_meta['message_disable'].'"></p>

				<p><input class="spwp86_inputs_bgcolor_'.$id.'" type="hidden" value="'.$spwp86_meta['inputs_bgcolor'].'"></p>
				<p><input class="spwp86_inputs_error_color_'.$id.'" type="hidden" value="'.$spwp86_meta['inputs_error_color'].'"></p>

				<p><input class="spwp86_ip_'.$id.'" type="hidden" value="'.$_SERVER['REMOTE_ADDR'].'"></p>
				<p id="spwp86_align_submit" style="text-align: '.$spwp86_meta['submit_text_align'].';"><input id="spwp86_button_'.$id.'" class="spwp86_button" style="'.$style_submit.'" type="button" value="'.esc_attr($spwp86_meta['lable_button']).'"></p>

				<p id="spwp86_msg" class="spwp86_msg_'.$id.'" style="'.$style_msg.'"></p>
				<p style="text-align:center; margin: 0px;"><a style="color:#337ab7; font-size:12px;" href="http://web-cude.com/" title="callback request wordpress">Callback Request WordPress</a></p>
			</div>
		</form>
		';

	return $get_spwp86_contact_form ;
}
