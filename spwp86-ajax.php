<?php
//E-mail notification
function spwp86_contact_form_send() {
	
	$id=strip_tags(stripslashes($_GET['spwp86_id_form']));
	$spwp86_meta = get_spwp86_meta_box_data($id);

	$spwp86_email_send = $spwp86_meta['spwp86_send_email'];
	$spwp86_ip = '<p>IP address: '.$_SERVER['REMOTE_ADDR'].'</p>';

	if(isset($_GET['spwp86_url'])){
		$spwp86_url=strip_tags(stripslashes($_GET['spwp86_url']));
		$spwp86_page = '<p>Page: '.$spwp86_url.'</p>';
	}


	if(isset($_GET['spwp86_full_name']) && $spwp86_meta['full_name_disable']!="y"){
		$spwp86_full_name=strip_tags(stripslashes($_GET['spwp86_full_name']));
		if(strlen($spwp86_full_name)>80){
			$spwp86_full_name_len=strlen($spwp86_full_name)-80;
			$spwp86_full_name=substr($spwp86_full_name, 0, -$spwp86_full_name_len);
		}

		$spwp86_full_name='<p>'.$spwp86_meta['lable_full_name'].': '.$spwp86_full_name.'</p>';
	}

	if(isset($_GET['spwp86_email']) && $spwp86_meta['email_disable']!="y"){
		$spwp86_email=strip_tags(stripslashes($_GET['spwp86_email']));
		if(strlen($spwp86_email)>80){
			$spwp86_email_len=strlen($spwp86_email)-80;
			$spwp86_email=substr($spwp86_email, 0, -$spwp86_email_len);
		}

		$spwp86_email='<p>'.$spwp86_meta['lable_email'].': '.$spwp86_email.'</p>';
	}

	if(isset($_GET['spwp86_phone']) && $spwp86_meta['phone_disable']!="y"){
		$spwp86_phone=strip_tags(stripslashes($_GET['spwp86_phone']));
		if(strlen($spwp86_phone)>40){
			$spwp86_phone_len=strlen($spwp86_phone)-40;
			$spwp86_phone=substr($spwp86_phone, 0, -$spwp86_phone_len);
		}
		$spwp86_phone=preg_replace('/[^0-9\(\)\-\+\s]/', '', $spwp86_phone);
		$spwp86_phone='<p>'.$spwp86_meta['lable_phone'].': '.$spwp86_phone.'</p>';

	}

	if(isset($_GET['spwp86_message']) && $spwp86_meta['message_disable']!="y"){
		$spwp86_message=strip_tags(stripslashes($_GET['spwp86_message']));
		if(strlen($spwp86_message)>800){
			$spwp86_message_len=strlen($spwp86_message)-800;
			$spwp86_message=substr($spwp86_message, 0, -$spwp86_message_len);
		}
		$spwp86_message='<p>'.$spwp86_meta['lable_message'].': '.$spwp86_message.'</p>';
	}

	$spwp86_message = '
			<html>
				<body>
					'.$spwp86_full_name.' '.$spwp86_email.' '.$spwp86_phone.' '.$spwp86_message.' '.$spwp86_ip.' '.$spwp86_page.'
				</body>
			</html>';

	add_filter('wp_mail_charset', create_function('', 'return "utf-8";'));
	add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

	wp_mail($spwp86_email_send, get_the_title($id), $spwp86_message, $spwp86_headers, $attachments);
	
	remove_filter('wp_mail_charset', create_function('', 'return "utf-8";'));
	remove_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
	
		
	$data = array(
	'comment_post_ID'      => $id,
	'comment_author'       => get_the_title($id),
	'comment_content'      => $spwp86_message,
	'comment_type'         => '',
	'comment_parent'       => 0,
	'user_id'              => 1,
	'comment_approved'     => 1,
	);
	wp_insert_comment($data);

	wp_die();
}

add_action('wp_ajax_spwp86_contact_form_send', 'spwp86_contact_form_send');
add_action('wp_ajax_nopriv_spwp86_contact_form_send', 'spwp86_contact_form_send');
