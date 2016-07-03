<?php
/**
 *
 * @author 		DesignByCode
 * @package 	DesignByCode admin settings
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function loggedIn(){
	$username = wp_get_current_user()->display_name;
	if(is_user_logged_in()){
		echo "Welcome " ,$username;
	}else{
		echo "Welcome Guest!";
	}
}
