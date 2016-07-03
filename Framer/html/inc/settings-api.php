<?php
//add_action( 'admin_menu', 'dbc_add_admin_menu' );
add_action( 'admin_init', 'dbc_settings_init' );


function dbc_add_admin_menu(  ) {
	add_menu_page(
		'Design by Code ',
		'Design by Code ',
		'manage_options',
		'designbycode-settings',
		'render_submenu_settings'
	);

}


function dbc_settings_init(  ) {
	/**************************
	* More Settings
	**************************/

	register_setting(
		'more-settings',
		'dbc_more_settings'
	);

	add_settings_section(
		'dbc_more_pluginpage_section',
		__( 'More Settings Section', 'designbycode' ),
		'dbc_more_settings_section_callback',
		'more-settings'
	);

	add_settings_field(
	'hide_ads',
	__( 'Show ads next to newsletter', 'designbycode' ),
	'dbc_more_checkbox_field_2_render',
	'more-settings',
	'dbc_more_pluginpage_section'
	);

	add_settings_field(
	'copyright',
	__( 'Copyright in footer', 'designbycode' ),
	'dbc_text_field_copyright_render',
	'more-settings',
	'dbc_more_pluginpage_section'
	);

	add_settings_field(
	'google_analytics',
	__( 'Google Analytics Code', 'designbycode' ),
	'dbc_text_field_analytics_render',
	'more-settings',
	'dbc_more_pluginpage_section'
	);



/**************************
* settings
**************************/


	register_setting(
		'switches',
		'dbc_switches'
	);

	add_settings_section(
		'dbc_switch_section',
		__( 'Settings to switch Sosial icons on and off', 'designbycode' ),
		'dbc_switches_section_callback',
		'switches'
	);

	add_settings_field(
	'sosial_icons',
	__( 'Sosial Network', 'designbycode' ),
	'dbc_checkbox_field_switches_1_render',
	'switches',
	'dbc_switch_section'
	);

	add_settings_field(
	'sosial_facebook',
	__( 'Facebook URL:', 'designbycode' ),
	'dbc_text_field_switches_input_1_render',
	'switches',
	'dbc_switch_section'
	);

	add_settings_field(
	'sosial_twitter',
	__( 'Twitter URL:', 'designbycode' ),
	'dbc_text_field_switches_input_2_render',
	'switches',
	'dbc_switch_section'
	);




	/**************************
	* Mailchimp section
	**************************/

	register_setting(
		'pluginpage',
		'dbc_settings'
	);

	add_settings_section(
		'dbc_pluginpage_section',
		__( 'Mailchimp Newsletter System', 'designbycode' ),
		'dbc_settings_section_callback',
		'pluginpage'
	);

	add_settings_field(
	'hide_footer',
	__( 'Activate Form', 'designbycode' ),
	'dbc_checkbox_field_2_render',
	'pluginpage',
	'dbc_pluginpage_section'
	);

	add_settings_field(
		'header_message',
		__( 'Form Name', 'designbycode' ),
		'dbc_text_field_0_render',
		'pluginpage',
		'dbc_pluginpage_section'
	);


	add_settings_field(
	'footer_message',
	__( 'Form id', 'designbycode' ),
	'dbc_text_field_1_render',
	'pluginpage',
	'dbc_pluginpage_section'
	);

	add_settings_field(
	'footer_message_under',
	__( 'Footer Message', 'designbycode' ),
	'dbc_text_field_2_render',
	'pluginpage',
	'dbc_pluginpage_section'
	);




}


/**************************
* Switches callbacks
**************************/
function dbc_switches_section_callback(  ) {

	echo __( 'The Switch settings' , 'designbycode' );

}

function dbc_checkbox_field_switches_1_render(  ) {
	$options = get_option( 'dbc_switches' );
	?>
		<input type="checkbox" name="dbc_switches[sosial_icons]" id="dbc_switches[sosial_icons]" value="1"<?php checked(isset($options['sosial_icons'] )); ?> > Show Sosial Icons
	<?php
}

function dbc_text_field_switches_input_1_render(  ) {

	$options = get_option( 'dbc_switches' );
	?>
	<input type='text' name='dbc_switches[sosial_facebook]' value='<?php echo $options['sosial_facebook']; ?>'>

	<?php

}

function dbc_text_field_switches_input_2_render(  ) {

	$options = get_option( 'dbc_switches' );
	?>
	<input type='text' name='dbc_switches[sosial_twitter]' value='<?php echo $options['sosial_twitter']; ?>'>

	<?php

}




/**************************
* Mailchimp callbacks
**************************/



function dbc_text_field_0_render(  ) {

	$options = get_option( 'dbc_settings' );
	?>
	<input type='text' name='dbc_settings[form_name]' value='<?php echo $options['form_name']; ?>'>
	<?php

}
function dbc_text_field_1_render(  ) {

	$options = get_option( 'dbc_settings' );
	?>
	<input type='text' name='dbc_settings[form_id]' value='<?php echo $options['form_id']; ?>'>

	<?php
}
function dbc_text_field_2_render(  ) {

	$options = get_option( 'dbc_settings' );
	?>
	<input type='text' name='dbc_settings[footer_message_under]' value='<?php echo $options['footer_message_under']; ?>'>

	<?php
}

function dbc_checkbox_field_2_render(  ) {
	$options = get_option( 'dbc_settings' );
	?>
		<input type="checkbox" name="dbc_settings[hide_footer]" id="dbc_settings[hide_footer]" value="1"<?php checked(isset($options['hide_footer'] )); ?> > Check on to make visabile
	<?php
}

function dbc_settings_section_callback(  ) {

	echo __( 'Fill in all the field to active your newsletter system. If you dont have a MailCimp account <a href="#">click here</a> to signup for free' , 'designbycode' );

}


function dbc_options_page(  ) {
	?>
	<form action='options.php' method='post'>
		<h2>Design by Code </h2>
		<?php
		settings_fields( 'pluginpage' );
		do_settings_sections( 'pluginpage' );
		submit_button();
		?>
	</form>
	<?php

}

/**************************
* More setings section
**************************/

function dbc_more_settings_section_callback(  ) {

	echo __( 'More Settings' , 'designbycode' );

}

function dbc_more_checkbox_field_2_render(  ) {
	$options = get_option( 'dbc_more_settings' );
	?>
		<input type="checkbox" name="dbc_more_settings[hide_ads]" id="dbc_more_settings[hide_ads]" value="1"<?php checked(isset($options['hide_ads'] )); ?> > Check on to make visabile ads
	<?php
}

function dbc_text_field_copyright_render(  ) {

	$options = get_option( 'dbc_more_settings' );
	?>
	<input type='text' name='dbc_more_settings[copyright]' value='<?php echo $options['copyright']; ?>'>

	<?php

}
function dbc_text_field_analytics_render(  ) {

	$options = get_option( 'dbc_more_settings' );
	?>
	<input type='text' name='dbc_more_settings[analytics]' value='<?php echo $options['analytics']; ?>'>

	<?php

}



/**************************
* Sanitize function
**************************/
function dbc_sanitize(){
	$sanitized_options = array();
	foreach($options as $options_key => $options_value){
		$sanitized_options[ $options_key ] = strip_tags(stripslashes($options_value));
	}
	return $sanitized_options;
}
