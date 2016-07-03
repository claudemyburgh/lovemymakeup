<?php

class OptionsPage{
	function __construct(){
		add_action('admin_menu', array($this, 'admin_menu'));
	}

	function admin_menu(){
		add_options_page(
			'Page Title',  					  // The text tb be displayed in the browser title bar
			'Option Title',	 				  // The text to be used for menu
			'manage_options',				 	// The required capability of user to access this menu
			'option-page-slug', 			// The slug which this menu is accessible by
			'demo_the_options',				// The name of the function used to render the page content
			array(
				$this,
				'settings_page'
			)
		);
	}

	function settings_page(){
		echo "This is the page content";
	}



}
