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


function lovemymakeup_add_custom_metabox(){
	add_meta_box(
		'lovemymakeup_video',
		'Learning Videos',
		'lovemymakeup_meta_callback',
		'training',
		'normal',
		'core'
	);
}

add_action('add_meta_boxes', 'lovemymakeup_add_custom_metabox');


function lovemymakeup_meta_callback(){
	?>
	<label for="videourl">
		YouTube Video Url
	</label>
	<input type="text" name="videourl" value=""> </br>
	<?php

	$content = get_post_meta( $post->ID, 'principle_duties', true);
	$editor = 'principle_duties';
	$settings = array(
		'textarea_rows' => 8
	);

	wp_editor($content, $editor, $settings);



}
