<?php


function lovemymakeup_customizer_live_preview(){

	wp_enqueue_script(
		'lovemymakeup-theme-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array('jquery', 'customize-preview'),
		'1.0.0',
		true
	);

}

add_action('customize_preview_init', 'lovemymakeup_customizer_live_preview');



function lovemymakeup_custom_css(){
?>
	<style type='text/css'>
			body{
				background: <?php echo get_theme_mod('lovemymakeup_background_color'); ?>;
			}

			.main-wrapper{
				width: <?php echo get_theme_mod('lovemymakeup_wrapper_width'); ?>px;
			}

			<?php if ('' !== get_theme_mod('lovemymakeup_banner_image')):?>
				.hero{
					background-image: url(<?php echo get_theme_mod('lovemymakeup_banner_image') ; ?>) ;
					background-repeat: no-repeat;
					background-position: left center;
					background-size: cover;
				}
			<?php else: ?>
				.hero{
					background-image: url(img/Banner3.jpg) ;
					background-repeat: no-repeat;
					background-position: left center;
					background-size: cover;
				}
			<?php endif; ?>
	</style>
<?php
}

add_action('wp_head', 'lovemymakeup_custom_css');


function lovemymakeup_register_theme_customizer( $wp_customizer ){

	$wp_customizer->add_section(
		'lovemymakeup_display_options',
		array(
			'title' => 'LoveMyMakeup Options',
			'priority' => 200
		)
	);

	$wp_customizer->add_setting(
		'lovemymakeup_background_color',
		array(
			'default' => '#e6e6e6',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		new WP_Customize_Color_Control(
			$wp_customizer,
			'lovemymakeup_background_color',
			array(
				'section' => 'lovemymakeup_display_options',
				'label' => 'Background Color',
				'settings' => 'lovemymakeup_background_color'
			)
		)
	);
	/////////////////////

	$wp_customizer->add_setting(
		'lovemymakeup_wrapper_width',
		array(
			'default' => 1000,
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'lovemymakeup_wrapper_width',
		array(
			'section' => 'lovemymakeup_display_options',
			'label' => 'Set the width of the wrapper',
			'type' => 'range',
			'input_attrs' => array(
				'min' => 900,
				'max' => 1300
			)
		)
	);




	/// banner settings

	$wp_customizer->add_section(
		'lovemymakeup_banner_options',
		array(
			'title' => 'LoveMyMakeup Banner Settings',
			'priority' => 201
		)
	);


	$wp_customizer->add_setting(
		'lovemymakeup_banner_image',
		array(
			'default' => IMAGES . 'Banner3.jpg',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		new WP_Customize_Image_Control(
			$wp_customizer,
			'lovemymakeup_banner_image',
			array(
				'label' => 'Banner Image',
				'section' => 'lovemymakeup_banner_options',
				'settings' => 'lovemymakeup_banner_image'
			)
		)
	);

	// $wp_customizer->add_control(
	// 	'lovemymakeup_width',
	// 	array(
	// 		'label' => 'Wrapper Width',
	// 		'section' => 'lovemymakeup_banner_options',
	// 		'settings' => 'lovemymakeup_wrapper_width'
	// 	)
	// );
	//
	// $wp_customizer->add_setting(
	// 	'lovemymakeup_wrapper_width',
	// 	array(
	// 		'default' => 'true',
	// 		'transport' => 'postMessage'
	// 	)
	// );




	$wp_customizer->add_setting(
		'lovemymakeup_hide_the_dot',
		array(
			'default' => 'true',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'lovemymakeup_hide_the_dot',
		array(
			'section' => 'lovemymakeup_banner_options',
			'label' => 'UnCheck to hide the Dot',
			'type' => 'checkbox'
		)
	);

	$wp_customizer->add_setting(
		'lovemymakeup_line_1_text',
		array(
			'default' => 'SUMMER COLLECTION',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'lovemymakeup_line_1_text',
		array(
			'section' => 'lovemymakeup_banner_options',
			'label' => 'Heading Text on dot',
			'type' => 'textarea'
		)
	);


	$wp_customizer->add_setting(
		'lovemymakeup_line_2_text',
		array(
			'default' => 'Now in stores',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'lovemymakeup_line_2_text',
		array(
			'section' => 'lovemymakeup_banner_options',
			'label' => 'The First line small text',
			'type' => 'text'
		)
	);
	$wp_customizer->add_setting(
		'lovemymakeup_line_3_text',
		array(
			'default' => 'To get the look​​​ come',
			'transport' => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'lovemymakeup_line_3_text',
		array(
			'section' => 'lovemymakeup_banner_options',
			'label' => 'The Second line small text',
			'type' => 'text'
		)
	);


}

add_action('customize_register','lovemymakeup_register_theme_customizer');
