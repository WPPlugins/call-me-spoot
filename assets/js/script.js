jQuery(document).ready(function($) {

		$('.spoot_popup .spoot_close_window, .spoot_overlay').click(function (){
			$('.spoot_popup, .spoot_overlay').css({'opacity': 0, 'visibility': 'hidden'});
		});

		$('a.spoot_open_window').click(function (e){
			$('.spoot_popup, .spoot_overlay').css({'opacity': 1, 'visibility': 'visible'});
			e.preventDefault();
		});

		//email validation function
		 function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			return pattern.test(emailAddress);
		}

		$(".spwp86_button").click(function() {
			var spwp86_id = this.id.substr(14);

			var spwp86_full_name = $(".spwp86_full_name_"+spwp86_id).val();
			var spwp86_email = $(".spwp86_email_"+spwp86_id).val();
			var spwp86_phone = $(".spwp86_phone_"+spwp86_id).val();
			var spwp86_message = $(".spwp86_message_"+spwp86_id).val();
			var spwp86_chat_id = $(".spwp86_chat_id_"+spwp86_id).val();
			var spwp86_bot_token = $(".spwp86_bot_token_"+spwp86_id).val();
			var spwp86_disable_email = $(".spwp86_disable_email_"+spwp86_id).val();
			var spwp86_disable_telegram = $(".spwp86_disable_telegram_"+spwp86_id).val();

			var spwp86_lable_full_name = $(".spwp86_lable_full_name_"+spwp86_id).html();
			var spwp86_lable_email = $(".spwp86_lable_email_"+spwp86_id).html();
			var spwp86_lable_phone = $(".spwp86_lable_phone_"+spwp86_id).html();
			var spwp86_lable_message = $(".spwp86_lable_message_"+spwp86_id).html();

			var spwp86_required_full_name = $(".spwp86_required_full_name_"+spwp86_id).val();
			var spwp86_required_email = $(".spwp86_required_email_"+spwp86_id).val();
			var spwp86_required_phone = $(".spwp86_required_phone_"+spwp86_id).val();
			var spwp86_required_message = $(".spwp86_required_message_"+spwp86_id).val();

			var spwp86_disable_full_name = $(".spwp86_disable_full_name_"+spwp86_id).val();
			var spwp86_disable_email = $(".spwp86_disable_email_"+spwp86_id).val();
			var spwp86_disable_phone = $(".spwp86_disable_phone_"+spwp86_id).val();
			var spwp86_disable_message = $(".spwp86_disable_message_"+spwp86_id).val();

			var spwp86_inputs_error_color = $(".spwp86_inputs_error_color_"+spwp86_id).val();
			var spwp86_inputs_bgcolor = $(".spwp86_inputs_bgcolor_"+spwp86_id).val();

			var spwp86_success_text = $(".spwp86_success_text_"+spwp86_id).val();

			var spwp86_ip = $(".spwp86_ip_"+spwp86_id).val();

			if(spwp86_required_full_name == 'y' && spwp86_full_name == '' && spwp86_disable_full_name!='y'){
				$(".spwp86_full_name_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
			} else {
				//email validation
				if (spwp86_required_email == 'y'){
					if(isValidEmailAddress(spwp86_email)){
						$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
					} else {
						$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
						return false;
					}
				}

				if(spwp86_required_email == 'y' && spwp86_email == '' && spwp86_disable_email!='y'){
					$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
				} else {
					//email validation
					if (spwp86_required_email == 'y'){
						if(isValidEmailAddress(spwp86_email)){
							$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
						} else {
							$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
							return false;
						}
					}

					if(spwp86_required_phone == 'y' && spwp86_phone == '' && spwp86_disable_phone!='y'){
						$(".spwp86_phone_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
					} else {
						//email validation
						if (spwp86_required_email == 'y'){
							if(isValidEmailAddress(spwp86_email)){
								$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
							} else {
								$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
								return false;
							}
						}

						if(spwp86_required_message == 'y' && spwp86_message == '' && spwp86_disable_message!='y'){
							$(".spwp86_message_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
						} else {

							var spwp86_url = location.href;

							//E-mail notification
							if(spwp86_disable_email!='y'){
								jQuery.getJSON(
									'/wp-admin/admin-ajax.php',
									{'action':'spwp86_contact_form_send', 'spwp86_full_name': spwp86_full_name, 'spwp86_email': spwp86_email, 'spwp86_phone': spwp86_phone, 'spwp86_message': spwp86_message, 'spwp86_id_form': spwp86_id, 'spwp86_url': spwp86_url },
									function(data) {
										$(".spwp86_full_name_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_email_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_phone_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_message_"+spwp86_id).prop( "disabled", true );
										$("#spwp86_button_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_msg_"+spwp86_id).html(spwp86_success_text);
									}
								);
							}

							//telegram notification
							if(spwp86_disable_telegram!='y'){

								var spwp86_text = '';

								if(spwp86_full_name!=''){
									spwp86_text+='<b>'+spwp86_lable_full_name+':</b> '+spwp86_full_name+'%0A';
								}

								if(spwp86_email!=''){
									spwp86_text+='<b>'+spwp86_lable_email+':</b> '+spwp86_email+'%0A';
								}

								if(spwp86_phone!=''){
									spwp86_text+='<b>'+spwp86_lable_phone+':</b> %2B'+spwp86_phone+'%0A';
								}

								if(spwp86_message!=''){
									spwp86_text+='<b>'+spwp86_lable_message+':</b> '+spwp86_message+'%0A';
								}

								spwp86_text+='<b>IP address:</b> '+spwp86_ip+'%0A';

								spwp86_text+='<b>Page:</b> '+spwp86_url+'%0A';

								jQuery.getJSON(
									'https://api.telegram.org/bot'+spwp86_bot_token+'/sendMessage?disable_web_page_preview=true&chat_id='+spwp86_chat_id+'&text='+spwp86_text+'&parse_mode=html',
									function(data){
										$(".spwp86_full_name_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_email_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_phone_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_message_"+spwp86_id).prop( "disabled", true );
										$("#spwp86_button_"+spwp86_id).prop( "disabled", true );
										$(".spwp86_msg_"+spwp86_id).html(spwp86_success_text);
									}
								);
							}

						}
					}
				}
			}


		});

		$('input').on('keydown', function () {
			//inputs backgroundColor
			var spwp86_class = $(this).attr('class');
			var spwp86_id = spwp86_class.split('_')[2];
			if(spwp86_id=='name'){spwp86_id = spwp86_class.split('_')[3];}

			var spwp86_required_email = $(".spwp86_required_email_"+spwp86_id).val();

			var spwp86_inputs_bgcolor = $(".spwp86_inputs_bgcolor_"+spwp86_id).val();
			var spwp86_inputs_error_color = $(".spwp86_inputs_error_color_"+spwp86_id).val();
			var spwp86_email = $(".spwp86_email_"+spwp86_id).val();

			$(".spwp86_full_name_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
			$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
			$(".spwp86_phone_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});

			//email validation
			$(".spwp86_email_"+spwp86_id).keypress(function (e) {
				if (spwp86_required_email == 'y'){
					if(isValidEmailAddress(spwp86_email)){
						$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
					} else {
						$(".spwp86_email_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_error_color});
					}
				}
			});
			
			//phone mask
			var spwp86_phone_mask = $(".spwp86_phone_mask_"+spwp86_id).val();
			$(".spwp86_phone_"+spwp86_id).mask(spwp86_phone_mask);
			
		});

		$("textarea").on('keydown', function () {
			//textarea backgroundColor
			var spwp86_class = $(this).attr('class');
			var spwp86_id = spwp86_class.split('_')[2];
			var spwp86_inputs_bgcolor = $(".spwp86_inputs_bgcolor_"+spwp86_id).val();
			$(".spwp86_message_"+spwp86_id).css({'backgroundColor' : spwp86_inputs_bgcolor});
		});
});
