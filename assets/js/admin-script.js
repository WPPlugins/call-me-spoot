jQuery(document).ready(function($) {
	
/* Field Settings */

//Disable
	$("#spwp86_contact_form_full_name_disable").change(function() {
		if($("#spwp86_contact_form_full_name_disable").attr("checked") == 'checked') {
			$(".spwp86_full_name").css({
				"display": "none",
			});

			$("#spwp86_contact_form_full_name_required").prop( "disabled", true );
			$("#spwp86_contact_form_lable_full_name").prop( "disabled", true );
			$("#spwp86_contact_form_placeholder_full_name").prop( "disabled", true );

		} else {
			$(".spwp86_full_name").css({
				"display": "block",
			});

			$("#spwp86_contact_form_full_name_required").prop( "disabled", false );
			$("#spwp86_contact_form_lable_full_name").prop( "disabled", false );
			$("#spwp86_contact_form_placeholder_full_name").prop( "disabled", false );

		}
	});

	$("#spwp86_contact_form_email_disable").change(function() {
		if($("#spwp86_contact_form_email_disable").attr("checked") == 'checked') {
			$(".spwp86_lable_email").css({
				"display": "none",
			});

			$("#spwp86_phone_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_email_required").prop( "disabled", true );
			$("#spwp86_contact_form_lable_email").prop( "disabled", true );
			$("#spwp86_contact_form_placeholder_email").prop( "disabled", true );
			$("#spwp86_contact_form_phone_disable").prop( "disabled", true );

			$("#spwp86_contact_form_phone_required").prop("checked", true );
			$("#spwp86_contact_form_phone_required").prop("disabled", true );
			$("#spwp86_contact_form_phone_required").val("y");

		} else {
			$(".spwp86_lable_email").css({
				"display": "block",
			});

			$("#spwp86_phone_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_email_required").prop( "disabled", false );
			$("#spwp86_contact_form_lable_email").prop( "disabled", false );
			$("#spwp86_contact_form_placeholder_email").prop( "disabled", false );
			$("#spwp86_contact_form_phone_disable").prop( "disabled", false );

			$("#spwp86_contact_form_phone_required").prop("checked", false );
			$("#spwp86_contact_form_phone_required").prop("disabled", false );
			$("#spwp86_contact_form_phone_required").val("n");

		}
	});

	$("#spwp86_contact_form_phone_disable").change(function() {
		if($("#spwp86_contact_form_phone_disable").attr("checked") == 'checked') {
			$(".spwp86_lable_phone").css({
				"display": "none",
			});

			$("#spwp86_email_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_phone_required").prop( "disabled", true );
			$("#spwp86_contact_form_lable_phone").prop( "disabled", true );
			$("#spwp86_contact_form_placeholder_phone").prop( "disabled", true );
			$("#spwp86_contact_form_mask_phone").prop( "disabled", true );
			$("#spwp86_contact_form_email_disable").prop( "disabled", true );

			$("#spwp86_contact_form_email_required").prop("checked", true );
			$("#spwp86_contact_form_email_required").prop("disabled", true );
			$("#spwp86_contact_form_email_required").val("y");

		} else {
			$(".spwp86_lable_phone").css({
				"display": "block",
			});

			$("#spwp86_email_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_phone_required").prop( "disabled", false );
			$("#spwp86_contact_form_lable_phone").prop( "disabled", false );
			$("#spwp86_contact_form_placeholder_phone").prop( "disabled", false );
			$("#spwp86_contact_form_mask_phone").prop( "disabled", false );
			$("#spwp86_contact_form_email_disable").prop( "disabled", false );

			$("#spwp86_contact_form_email_required").prop("checked", false );
			$("#spwp86_contact_form_email_required").prop("disabled", false );
			$("#spwp86_contact_form_email_required").val("n");

		}
	});

	$("#spwp86_contact_form_message_disable").change(function() {
		if($("#spwp86_contact_form_message_disable").attr("checked") == 'checked') {
			$(".spwp86_lable_message").css({
				"display": "none",
			});

			$("#spwp86_contact_form_message_required").prop( "disabled", true );
			$("#spwp86_contact_form_lable_message").prop( "disabled", true );
			$("#spwp86_contact_form_placeholder_message").prop( "disabled", true );
			$("#spwp86_contact_form_mask_message").prop( "disabled", true );

		} else {
			$(".spwp86_lable_message").css({
				"display": "block",
			});

			$("#spwp86_contact_form_message_required").prop( "disabled", false );
			$("#spwp86_contact_form_lable_message").prop( "disabled", false );
			$("#spwp86_contact_form_placeholder_message").prop( "disabled", false );
			$("#spwp86_contact_form_mask_message").prop( "disabled", false );

		}
	});

	$("#spwp86_contact_form_header_disable").change(function() {
		if($("#spwp86_contact_form_header_disable").attr("checked") == 'checked') {
			$("#spwp86_header").css({
				"display": "none",
			});
		} else {
			$("#spwp86_header").css({
				"display": "block",
			});
		}
	});

//Required
	$("#spwp86_contact_form_full_name_required").change(function() {
		if($("#spwp86_contact_form_full_name_required").attr("checked") == 'checked') {
			$("#spwp86_full_name_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_full_name_required_flag").val("n");

		} else {
			$("#spwp86_full_name_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_full_name_required_flag").val("y");
		}
	});

	$("#spwp86_contact_form_email_required").change(function() {
		if($("#spwp86_contact_form_email_required").attr("checked") == 'checked') {
			$("#spwp86_email_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_email_required_flag").val("n");

		} else {
			$("#spwp86_email_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_email_required_flag").val("y");

		}
	});

	$("#spwp86_contact_form_phone_required").change(function() {
		if($("#spwp86_contact_form_phone_required").attr("checked") == 'checked') {
			$("#spwp86_phone_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_phone_required").val("y");

		} else {
			$("#spwp86_phone_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_phone_required").val("n");

		}
	});

	$("#spwp86_contact_form_message_required").change(function() {
		if($("#spwp86_contact_form_message_required").attr("checked") == 'checked') {
			$("#spwp86_message_required").css({
				"display": "inline",
			});

			$("#spwp86_contact_form_message_required").val("y");

		} else {
			$("#spwp86_message_required").css({
				"display": "none",
			});

			$("#spwp86_contact_form_message_required").val("n");
		}
	});

//Labels
	$("#spwp86_contact_form_lable_full_name").keyup(function(){
		var spwp86_lable_full_name = $("#spwp86_contact_form_lable_full_name").val();
		$("#spwp86_lable_full_name").text(spwp86_lable_full_name);
	});

	$("#spwp86_contact_form_lable_email").keyup(function(){
		var spwp86_lable_email = $("#spwp86_contact_form_lable_email").val();
		$("#spwp86_lable_email").text(spwp86_lable_email);
	});

	$("#spwp86_contact_form_lable_phone").keyup(function(){
		var spwp86_lable_phone = $("#spwp86_contact_form_lable_phone").val();
		$("#spwp86_lable_phone").text(spwp86_lable_phone);
	});

	$("#spwp86_contact_form_lable_message").keyup(function(){
		var spwp86_lable_message = $("#spwp86_contact_form_lable_message").val();
		$("#spwp86_lable_message").text(spwp86_lable_message);
	});

//Placeholder
	$("#spwp86_contact_form_placeholder_full_name").keyup(function(){
		var spwp86_placeholder_full_name = $("#spwp86_contact_form_placeholder_full_name").val();
		$("#spwp86_full_name").attr("placeholder", spwp86_placeholder_full_name);
	});

	$("#spwp86_contact_form_placeholder_email").keyup(function(){
		var spwp86_placeholder_email = $("#spwp86_contact_form_placeholder_email").val();
		$("#spwp86_email").attr("placeholder", spwp86_placeholder_email);
	});

	$("#spwp86_contact_form_placeholder_phone").keyup(function(){
		var spwp86_placeholder_phone = $("#spwp86_contact_form_placeholder_phone").val();
		$("#spwp86_phone").attr("placeholder", spwp86_placeholder_phone);
	});

	$("#spwp86_contact_form_placeholder_message").keyup(function(){
		var spwp86_placeholder_message = $("#spwp86_contact_form_placeholder_message").val();
		$("#spwp86_message").attr("placeholder", spwp86_placeholder_message);
	});

/* Form Settings */

	$("#spwp86_contact_form_header").keyup(function(){
		var spwp86_contact_form_header = $("#spwp86_contact_form_header").val();
		$("#spwp86_header").text(spwp86_contact_form_header);
	});

	$("#spwp86_contact_form_lable_button").keyup(function(){
		var spwp86_contact_form_lable_button = $("#spwp86_contact_form_lable_button").val();
		$(".spwp86_button").val(spwp86_contact_form_lable_button);
	});



/* Notification */

	if($("#spwp86_contact_form_disable_email").attr("checked") == 'checked') {
		$("#spwp86_contact_send_email").prop( "disabled", true );
	} else {
		$("#spwp86_contact_send_email").prop( "disabled", false);
	}

	$("#spwp86_contact_form_disable_email").change(function() {
		if($("#spwp86_contact_form_disable_email").attr("checked") == 'checked') {
			$("#spwp86_contact_send_email").prop( "disabled", true );
		} else {
			$("#spwp86_contact_send_email").prop( "disabled", false);
		}
	});

	if($("#spwp86_contact_form_disable_telegram").attr("checked") == 'checked') {
		$("#spwp86_contact_form_bot_token").prop( "disabled", true );
		$("#spwp86_contact_form_chat_id").prop( "disabled", true );
		$("#spwp86_contact_form_disable_telegram_flag").val("y");
	} else {
		$("#spwp86_contact_form_bot_token").prop( "disabled", false );
		$("#spwp86_contact_form_chat_id").prop( "disabled", false );
		$("#spwp86_contact_form_disable_telegram_flag").val("n");
	}

	$("#spwp86_contact_form_disable_telegram").change(function() {
		if($("#spwp86_contact_form_disable_telegram").attr("checked") == 'checked') {
			$("#spwp86_contact_form_bot_token").prop( "disabled", true );
			$("#spwp86_contact_form_chat_id").prop( "disabled", true );
			$("#spwp86_contact_form_disable_telegram_flag").val("y");
		} else {
			$("#spwp86_contact_form_bot_token").prop( "disabled", false );
			$("#spwp86_contact_form_chat_id").prop( "disabled", false );
			$("#spwp86_contact_form_disable_telegram_flag").val("n");
		}
	});

	//table menu toggle
	$('.spwp86_table_form_field_name_show').click(function() {
		$('.spwp86_table_form_field_name').toggle('slow');
	});

	$('.spwp86_table_form_field_email_show').click(function() {
		$('.spwp86_table_form_field_email').toggle('slow');
	});

	$('.spwp86_table_form_field_phone_show').click(function() {
		$('.spwp86_table_form_field_phone').toggle('slow');
	});

	$('.spwp86_table_form_field_message_show').click(function() {
		$('.spwp86_table_form_field_message').toggle('slow');
	});


	$('.spwp86_table_form_title_show').click(function() {
		$('.spwp86_table_form_title').toggle('slow');
	});

	$('.spwp86_table_form_captha_show').click(function() {
		$('.spwp86_table_form_captha').toggle('slow');
	});

	$('.spwp86_table_form_button_show').click(function() {
		$('.spwp86_table_form_button').toggle('slow');
	});


	$('.spwp86_table_form_styles_show').click(function() {
		$('.spwp86_table_form_styles').toggle('slow');
	});

	$('.spwp86_table_form_heading_styles_show').click(function() {
		$('.spwp86_table_form_heading_styles').toggle('slow');
	});

	$('.spwp86_table_form_label_styles_show').click(function() {
		$('.spwp86_table_form_label_styles').toggle('slow');
	});

	$('.spwp86_table_form_input_styles_show').click(function() {
		$('.spwp86_table_form_input_styles').toggle('slow');
	});

	$('.spwp86_table_form_submit_styles_show').click(function() {
		$('.spwp86_table_form_submit_styles').toggle('slow');
	});


	$('.spwp86_table_form_notification_show').click(function() {
		$('.spwp86_table_form_notification').toggle('slow');
	});

	$('.spwp86_table_form_notification_telegram_show').click(function() {
		$('.spwp86_table_form_notification_telegram').toggle('slow');
	});

	$('.spwp86_table_form_success_text_show').click(function() {
		$('.spwp86_table_form_success_text').toggle('slow');
	});

/* Button Settings */

	if($("#spoot_s_enable_button").attr("checked") != 'checked') {
		$("#spoot_s_forms").prop( "disabled", true );
		$("#spoot_s_position").prop( "disabled", true );
		$("#spoot_s_bottom").prop( "disabled", true );
		$("#spoot_s_left").prop( "disabled", true );
		$("#spoot_s_right").prop( "disabled", true );
		$("#spoot_s_enable_mobile").prop( "disabled", true );
		$("#spoot_s_animation").prop( "disabled", true );
		$(".spoot_s_icon").prop( "disabled", true );
		$(".spoot_s_border_color").css({"display":"none"});
		$(".spoot_s_color").css({"display":"none"});
		$(".spoot_s_icon_color").css({"display":"none"});

	} else {

		$('.spoot_s_icon').change(function() {
			var spoot_icon = $('.spoot_s_icon').val();
			$("#spoot-button-icon").attr("class", spoot_icon);
		});

		var spoot_s_position = $("#spoot_s_position").val();

		if(spoot_s_position == "left"){
			$("#spoot_s_right").prop( "disabled", true );
			$("#spoot_s_left").prop( "disabled", false);
		}

		if(spoot_s_position == "right"){
			$("#spoot_s_right").prop( "disabled", false );
			$("#spoot_s_left").prop( "disabled", true);
		}
		//wpColorPicker	
		var myOptions = {
			change: function(event, ui){ 
				var spoot_s_icon_color = $('.spoot_s_icon_color .wp-color-result').css('background-color');
				var spoot_s_color = $('.spoot_s_color .wp-color-result').css('background-color');
				var spoot_s_border_color = $('.spoot_s_border_color .wp-color-result').css('background-color');
				
				$(".spoot-button").css({
					"background-color": spoot_s_color,
					"border-color": spoot_s_border_color,
				});
				
				$("#spoot-button-icon").css({
					"color": spoot_s_icon_color,
				});
				
			},
		};
		
		$('input[name*="color"]').wpColorPicker(myOptions);
			
	}

	$("#spoot_s_enable_button").change(function() {
		if($("#spoot_s_enable_button").attr("checked") != 'checked') {

			$("#spoot_s_forms").prop( "disabled", true );
			$("#spoot_s_position").prop( "disabled", true );
			$("#spoot_s_bottom").prop( "disabled", true );
			$("#spoot_s_left").prop( "disabled", true );
			$("#spoot_s_right").prop( "disabled", true );
			$("#spoot_s_enable_mobile").prop( "disabled", true );
			$("#spoot_s_animation").prop( "disabled", true );
			$(".spoot_s_icon").prop( "disabled", true );
			$(".spoot_s_border_color").css({"display":"none"});
			$(".spoot_s_color").css({"display":"none"});
			$(".spoot_s_icon_color").css({"display":"none"});
			
		} else {
			
			$("#spoot_s_forms").prop( "disabled", false );
			$("#spoot_s_position").prop( "disabled", false );
			$("#spoot_s_animation").prop( "disabled", false );
			$("#spoot_s_enable_mobile").prop( "disabled", false );
			$(".spoot_s_icon").prop( "disabled", false );
			$("#spoot_s_bottom").prop( "disabled", false );
			$(".spoot_s_border_color").css({"display":"block"});
			$(".spoot_s_color").css({"display":"block"});
			$(".spoot_s_icon_color").css({"display":"block"});
			
			var spoot_s_position = $("#spoot_s_position").val();

			if(spoot_s_position == "left"){
				$("#spoot_s_right").prop( "disabled", true );
				$("#spoot_s_left").prop( "disabled", false);
			}

			if(spoot_s_position == "right"){
				$("#spoot_s_right").prop( "disabled", false );
				$("#spoot_s_left").prop( "disabled", true);
			}	
			
			$('.spoot_s_icon').change(function() {
			var spoot_icon = $('.spoot_s_icon').val();
				$("#spoot-button-icon").attr("class", spoot_icon);
			});
			//wpColorPicker
			var myOptions = {
				change: function(event, ui){ 
					var spoot_s_icon_color = $('.spoot_s_icon_color .wp-color-result').css('background-color');
					var spoot_s_color = $('.spoot_s_color .wp-color-result').css('background-color');
					var spoot_s_border_color = $('.spoot_s_border_color .wp-color-result').css('background-color');
					
					$(".spoot-button").css({
						"background-color": spoot_s_color,
						"border-color": spoot_s_border_color,
					});
					
					$("#spoot-button-icon").css({
						"color": spoot_s_icon_color,
					});
					
				},
			};
			
			$('input[name*="color"]').wpColorPicker(myOptions);
						
		}
	});

});
