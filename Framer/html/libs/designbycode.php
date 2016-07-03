<?php

/**
 * Single Product title
 *
 * @author 		DesignByCode
 * @package 	DesignByCode admin settings
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**************************
* add Style and scripts
**************************/
function adminStyle(){
	wp_enqueue_style('admin-style', ROOT .'/admin-style.css', array('dashicons')  );
	wp_enqueue_script('admin', ROOT . '/js/admin.js', array('jquery'), false, '2.1.4', true);
}
add_action('admin_enqueue_scripts', 'adminStyle');

/**************************
* Add to settings page
**************************/
function dbc_add_to_settings_page(){
	add_options_page(
		'Demo Theme Options',
		'Demo Theme Options',
		'edit_dashboard',
		'manage_options',
		'demo-theme-options',
		'demo_theme_options_display'
	);
}

//add_action('admin_menu', 'dbc_add_to_settings_page');


/**************************
*  Custom Settings Page
**************************/
function dbc_init_theme_options(){
	// footer message
	add_settings_section(
		'footer_section',
		__('Footer Option', 'designbycode'),
		'demo_footer_options_display',
		'demo-theme-options'
	);
	add_settings_field(
		'footer_message',
		__('Theme Footer Message', 'designbycode'),
		'demo_footer_message_display',
		'demo-theme-options',
		'footer_section'
	);
	register_setting(
		'footer_section',
		'footer_message'
	);
}
//add_action('admin_init', 'dbc_init_theme_options');




/**************************
* Setting Method
**************************/

function dbc_add_options_page(){

	add_menu_page(
		'DesignByCode',
		__('DesignByCode','designbycode'),
		'manage_options',
		'design-by-code',
		'dbc_display_mainmenu_page',
		'dashicons-businessman',
		'1'
	);
	// add_submenu_page(
	// 	'design-by-code',
	// 	__('DesignByCode About Page','designbycode'),
	// 	'About',
	// 	'manage_options',
	// 	'designbycode-about',
	// 	'render_submenu_about'
	// );
	add_submenu_page(
		'design-by-code',
		__('DesignByCode Settings','designbycode'),
		'Settings',
		'manage_options',
		'designbycode-settings',
		'render_submenu_settings'
	);
	// add_submenu_page(
	// 	'design-by-code',
	// 	__('DesignByCode Recommended','designbycode'),
	// 	'Recommended',
	// 	'manage_options',
	// 	'designbycode-recommended',
	// 	'render_submenu_recommended'
	// );
	// add_submenu_page(
	// 	'design-by-code',
	// 	__('DesignByCode Tutorials','designbycode'),
	// 	'Tutorials',
	// 	'manage_options',
	// 	'designbycode-tutorials',
	// 	'render_submenu_tutorials'
	// );

}
add_action('admin_menu', 'dbc_add_options_page');




/**************************
* Callback Settings for Displaying Pages
**************************/

function dbc_display_mainmenu_page(){
	renderHeaderMain();
  renderNavbar();
	?>
	<div class="wrapper">
		<div class="row padding">

		<h1>A full list of services coming soon</h1>
	</div>
	</div>

<?php
}
/**************************
* render submenu
**************************/
function render_submenu_about(){
	renderHeaderMain();
	renderNavbar();
	?>
	<div class="wrapper">
		<div class="row">
			<div class="md-col-12">
				<div class="inner-container">
					<header>
						<h1>About Us</h1>
					</header>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="md-col-12">
				<div class="inner-container">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa reiciendis facere quasi voluptatum commodi reprehenderit aliquid, impedit itaque quam earum fuga nulla consectetur velit saepe a ipsa? Officiis ab distinctio iusto, provident itaque cum eum cumque deserunt assumenda qui! Laboriosam tenetur saepe eum inventore iste odit nihil nam quis voluptatem porro eligendi voluptate voluptates laudantium aut autem culpa, perspiciatis recusandae, omnis officia adipisci distinctio repudiandae nemo mollitia, nesciunt tempore. Hic tempore pariatur adipisci, odit delectus illo, quis cum nulla labore deserunt, velit, perferendis at. Ullam, ducimus, reiciendis. Ullam temporibus quidem, qui doloremque, aliquam, animi nihil architecto ratione dolorem sunt saepe?</p>
				</div>
			</div>
		</div>
	</div>

	<?php
}

function render_submenu_settings(){
	renderHeaderMain();
	renderNavbar();
	?>
	<div class="wrapper">
		<div class="row">
			<div class="md-col-12">
				<div class="inner-container">
					<header>
						<h1>Settings Section</h1>
					</header>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="md-col-8">
				<div class="inner-container-box">
					<?php settings_errors(); ?>
					<form class="" action="options.php" method="post">
						<?php
							do_settings_sections('switches');
							settings_fields('switches');
							submit_button();
						?>
					</form>
				</div>
				<div class="inner-container-box">
					<?php settings_errors(); ?>
					<form class="" action="options.php" method="post">
						<?php
							do_settings_sections('pluginpage');
							settings_fields('pluginpage');
							submit_button();
						?>
					</form>

				</div>
				<div class="inner-container-box">
					<?php settings_errors(); ?>
					<form class="" action="options.php" method="post">
						<?php
							do_settings_sections('more-settings');
							settings_fields('more-settings');
							submit_button();
						?>
					</form>

				</div>
			</div>
			<div class="md-col-4">
				<div class="inner-container-box">
					<header>
						<h3>Heading</h3>
					</header>
				</div>
			</div>
		</div>

	</div>
	<?php
}

function render_submenu_recommended(){
	renderHeaderMain();
	renderNavbar();
	?>
	<div class="wrapper">
		<div class="row">
			<div class="inner-container">
				<header>
					<h1>Recommended Procucts</h1>
				</header>
				<article>
					<p>
						This is a list of recomended product which is recomended by <a target="blank" href="http://designbycode.co.za">DesignByCode</a>
					</p>
				</article>
			</div>
		</div>

		<div class="row ">
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Rapid SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Comodo Essential SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Comodo Positive SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Certum Basic ID SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Certum Commercial SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Certum Professional SSL </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> GeoTrust Anti-Malware   </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Thawte SSL123 </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Symantec Secure Site Pro </h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>
			<div class="md-col-4 equel">
				<div class="inner-container shadow-box">
				<header>
					<h1><span class="dashicons dashicons-shield"></span> Mail Chimp</h1>
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nostrum nam mollitia, neque quaerat dolore aliquam sunt voluptas doloribus est perferendis nulla cum beatae accusamus totam tempore enim natus tempora.
				</section>
				<footer>
					<a href="#" class="btn btn-primary">Learn More</a>
				</footer>
			</div>
			</div>

		</div>
	</div>
	<?php
}


function render_submenu_tutorials(){
	renderHeaderMain();
	renderNavbar();
	?>
	<div class="wrapper">
		<div class="row">
			<div class="md-col-12">
				<div class="inner-container">
					<header>
						<h1>Tutorials</h1>
					</header>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="md-col-12">
				<div class="inner-container">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa reiciendis facere quasi voluptatum commodi reprehenderit aliquid, impedit itaque quam earum fuga nulla consectetur velit saepe a ipsa? Officiis ab distinctio iusto, provident itaque cum eum cumque deserunt assumenda qui! Laboriosam tenetur saepe eum inventore iste odit nihil nam quis voluptatem porro eligendi voluptate voluptates laudantium aut autem culpa, perspiciatis recusandae, omnis officia adipisci distinctio repudiandae nemo mollitia, nesciunt tempore. Hic tempore pariatur adipisci, odit delectus illo, quis cum nulla labore deserunt, velit, perferendis at. Ullam, ducimus, reiciendis. Ullam temporibus quidem, qui doloremque, aliquam, animi nihil architecto ratione dolorem sunt saepe?</p>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function renderHeaderMain(){
	?>
	<header class="my-admin-header">
		<div class="wrapper">
			<div class="row">
				<div class="md-col-4">
					<a class="logo-link" href="http://designbycode.co.za" target="black">
						<svg id="designbycodelogo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 316.3 223" style="enable-background:new 0 0 316.3 223;" xml:space="preserve">
							 <style type="text/css">
		 	.st0{fill:#4BC1DD;}
		 	.st1{fill:#CCCBCB;}
		 	.st2{fill:#CCCCCC;}
		 	.st3{fill:none;stroke:#4BC1DD;stroke-width:3;stroke-miterlimit:10;}
		 </style>
		 <g>
		 	<path class="st0" d="M98.3,0v68.9h-1h1v48h-13V71.9c0-4.6-1-8.8-3-12.6c-2-3.8-4.6-7.2-7.8-10.2c-3.3-3-7.1-5.5-11.6-7.4
		 		c-4.5-1.9-9.2-2.8-14.2-2.8c-5,0-9.6,0.9-13.8,2.8c-4.2,1.9-8,4.3-11.4,7.4c-3.1,3-5.6,6.4-7.5,10.2c-1.9,3.8-2.9,8-2.9,12.6
		 		s1,9,2.9,13.2c1.9,4.2,4.4,7.8,7.5,10.9c3.4,3,7.2,5.4,11.4,7.2c4.2,1.8,8.8,2.6,13.8,2.6v12.2c-6.8,0-13.1-1.2-19-3.7
		 		c-5.9-2.4-11-5.7-15.4-9.9c-4.4-4.2-7.9-9.1-10.4-14.7C1.3,84.1,0,78.2,0,71.9c0-6.3,1.3-12.2,3.8-17.6C6.4,48.8,9.9,44,14.3,40
		 		c4.4-4,9.5-7.2,15.4-9.5c5.9-2.3,12.2-3.5,19-3.5c7.1,0,13.7,1.3,19.8,4c6.2,2.7,11.7,6.3,16.7,10.9V0"/>
		 	<path class="st0" d="M109.6,117.7V69.9h1h-1V1.2h12.8v41.8c5-4.4,10.6-7.9,16.8-10.8c6.2-2.8,12.9-4.2,19.9-4.2
		 		c6.6,0,12.9,1.2,18.8,3.6c5.9,2.4,11,5.6,15.3,9.6c4.3,4,7.8,8.7,10.3,14.2c2.6,5.4,3.8,11.2,3.8,17.4c0,6.3-1.3,12.2-3.8,17.7
		 		c-2.6,5.5-6,10.4-10.3,14.6c-4.3,4.2-9.4,7.5-15.3,9.9c-5.9,2.4-12.2,3.7-18.8,3.7v-11.8c4.8,0,9.3-0.9,13.4-2.7
		 		c4.1-1.8,7.8-4.2,11.1-7.3c3.3-3,5.9-6.6,7.8-10.8c2-4.2,3-8.6,3-13.2c0-4.4-1-8.5-3-12.3c-2-3.9-4.6-7.3-7.8-10.1
		 		c-3.3-3.1-6.9-5.6-11.1-7.4c-4.1-1.8-8.6-2.6-13.4-2.6c-5.4,0-10.3,0.9-14.6,2.6c-4.3,1.8-8.1,4.2-11.4,7.4
		 		c-3.3,2.9-5.9,6.3-7.8,10.1c-2,3.9-3,8-3,12.3v45.1H109.6z"/>
		 	<path class="st0" d="M217,71.9c0-6.3,1.3-12.2,4-17.7c2.7-5.5,6.3-10.4,10.9-14.5c4.6-4.1,9.9-7.4,16-9.7
		 		c6.1-2.3,12.5-3.5,19.3-3.5c6.8,0,13.2,1.2,19.1,3.5c6,2.3,11.2,5.6,15.6,9.7c4.5,4.1,8,9,10.5,14.5c2.6,5.5,3.8,11.4,3.8,17.8
		 		h-13.2c0-4.6-1-8.9-3-12.8s-4.6-7.4-7.8-10.4c-3.3-3-7-5.4-11.3-7.3c-4.3-1.8-8.9-2.7-13.9-2.7c-5.4,0-10.3,0.9-14.7,2.7
		 		c-4.4,1.8-8.2,4.2-11.5,7.3c-3.3,3-5.9,6.5-7.8,10.4c-2,3.9-3,8.2-3,12.8c0,4.5,1,8.9,3,13.2c2,4.3,4.6,8,7.8,11
		 		c3.3,3,7.1,5.4,11.5,7.3c4.4,1.8,9.3,2.7,14.7,2.7v12.2c-6.8,0-13.2-1.2-19.3-3.7c-6.1-2.5-11.4-5.8-16-10
		 		c-4.6-4.2-8.2-9.1-10.9-14.7C218.3,84.1,217,78.2,217,71.9z"/>
		 	<g id="slug">
		 		<path class="st1" d="M19.9,168.3v-30.5h10.5c3.7,0,6.8,1.2,9.2,3.6c2.4,2.4,3.6,5.4,3.6,9.2v5c0,3.7-1.2,6.8-3.6,9.2
		 			c-2.4,2.4-5.5,3.5-9.2,3.5H19.9z M26,142.5v21.1h4c2.2,0,3.9-0.7,5.1-2.2c1.2-1.5,1.9-3.4,1.9-5.8v-5.1c0-2.4-0.6-4.3-1.9-5.8
		 			c-1.2-1.5-3-2.2-5.1-2.2H26z"/>
		 		<path class="st1" d="M57.5,168.7c-3.3,0-5.9-1-7.8-3.1c-2-2.1-2.9-4.8-2.9-8v-0.8c0-3.4,0.9-6.1,2.8-8.3c1.8-2.2,4.3-3.3,7.4-3.2
		 			c3.1,0,5.4,0.9,7.1,2.8c1.7,1.8,2.5,4.3,2.5,7.5v3.3H53.1l0,0.1c0.1,1.5,0.6,2.7,1.5,3.7c0.9,1,2.1,1.4,3.6,1.4
		 			c1.4,0,2.5-0.1,3.4-0.4c0.9-0.3,1.9-0.7,2.9-1.3l1.7,3.8c-0.9,0.8-2.1,1.4-3.6,1.9C61,168.5,59.3,168.7,57.5,168.7z M56.9,149.9
		 			c-1.1,0-2,0.4-2.7,1.3c-0.7,0.9-1.1,2-1.2,3.4l0.1,0.1h7.5v-0.5c0-1.3-0.3-2.3-0.9-3.1C59.1,150.3,58.2,149.9,56.9,149.9z"/>
		 		<path class="st1" d="M82.4,162.1c0-0.7-0.3-1.2-1-1.7c-0.6-0.5-1.9-0.9-3.6-1.3c-2.7-0.5-4.7-1.3-6.1-2.4c-1.4-1.1-2-2.5-2-4.4
		 			c0-2,0.8-3.6,2.5-5c1.6-1.4,3.8-2,6.6-2c2.9,0,5.2,0.7,6.9,2c1.7,1.4,2.5,3.1,2.5,5.1l0,0.1h-5.9c0-0.9-0.3-1.6-0.9-2.2
		 			c-0.6-0.6-1.4-0.9-2.5-0.9c-1,0-1.8,0.2-2.3,0.7c-0.6,0.5-0.8,1.1-0.8,1.8c0,0.7,0.3,1.3,0.9,1.7c0.6,0.4,1.8,0.8,3.6,1.2
		 			c2.8,0.6,4.9,1.4,6.2,2.5c1.4,1.1,2,2.6,2,4.5c0,2-0.9,3.7-2.6,5c-1.7,1.3-4,1.9-6.9,1.9c-3,0-5.4-0.8-7.1-2.3
		 			c-1.8-1.5-2.6-3.3-2.5-5.2l0-0.1h5.6c0,1.2,0.4,2.1,1.2,2.6c0.8,0.5,1.7,0.8,3,0.8c1.1,0,2-0.2,2.6-0.7
		 			C82.1,163.4,82.4,162.8,82.4,162.1z"/>
		 		<path class="st1" d="M98.7,140.2h-6.1v-4.6h6.1V140.2z M98.7,168.3h-6.1v-22.6h6.1V168.3z"/>
		 		<path class="st1" d="M102.8,157.2c0-3.6,0.8-6.5,2.3-8.6c1.6-2.2,3.7-3.3,6.5-3.3c1.3,0,2.4,0.3,3.3,0.9c1,0.6,1.8,1.4,2.5,2.4
		 			l0.5-2.9h5.3v22.5c0,2.9-1,5.2-2.9,6.8c-1.9,1.6-4.6,2.4-8.1,2.4c-1.1,0-2.4-0.2-3.6-0.5c-1.3-0.3-2.5-0.7-3.6-1.3l1.1-4.6
		 			c0.9,0.4,1.9,0.8,2.9,1c1,0.2,2,0.3,3.2,0.3c1.7,0,2.9-0.3,3.7-1c0.8-0.7,1.2-1.8,1.2-3.3v-2.1c-0.7,0.9-1.5,1.5-2.4,1.9
		 			c-0.9,0.4-1.9,0.7-3.1,0.7c-2.8,0-4.9-1-6.5-3.1c-1.6-2-2.3-4.7-2.3-8.1V157.2z M108.9,157.6c0,2,0.3,3.6,1,4.7
		 			c0.7,1.1,1.8,1.7,3.3,1.7c0.9,0,1.7-0.2,2.4-0.5c0.6-0.3,1.2-0.8,1.6-1.5v-9.9c-0.4-0.7-0.9-1.2-1.6-1.6c-0.6-0.4-1.4-0.6-2.3-0.6
		 			c-1.5,0-2.6,0.7-3.3,2c-0.7,1.3-1,3.1-1,5.2V157.6z"/>
		 		<path class="st1" d="M133.5,145.7l0.3,3.2c0.8-1.2,1.7-2.1,2.8-2.7c1.1-0.6,2.3-1,3.7-1c2.3,0,4.1,0.7,5.4,2.2
		 			c1.3,1.4,1.9,3.7,1.9,6.8v14.1h-6.1v-14.2c0-1.5-0.3-2.6-0.9-3.2c-0.6-0.6-1.5-1-2.8-1c-0.8,0-1.5,0.2-2.2,0.5s-1.2,0.8-1.6,1.4
		 			v16.5h-6.1v-22.6H133.5z"/>
		 		<path class="st1" d="M152.6,168.3v-30.5h10.3c3.6,0,6.4,0.7,8.4,2.1c2,1.4,3,3.5,3,6.3c0,1.4-0.4,2.7-1.1,3.8
		 			c-0.7,1.1-1.8,1.9-3.3,2.5c1.8,0.4,3.2,1.2,4.1,2.5c0.9,1.3,1.4,2.8,1.4,4.5c0,2.9-1,5.1-2.9,6.6c-1.9,1.5-4.7,2.3-8.2,2.3H152.6z
		 			 M158.7,150.6h4.4c1.6,0,2.9-0.3,3.8-1c0.9-0.7,1.3-1.6,1.3-2.9c0-1.4-0.4-2.4-1.3-3.1c-0.9-0.7-2.2-1-4-1h-4.2V150.6z
		 			 M158.7,154.8v8.8h5.6c1.6,0,2.9-0.4,3.7-1.1c0.9-0.7,1.3-1.7,1.3-3.1c0-1.5-0.4-2.6-1.1-3.4c-0.7-0.8-1.9-1.2-3.4-1.2H158.7z"/>
		 		<path class="st1" d="M187.8,158.8l0.3,1.3h0.1l4.3-14.4h6.6l-9.2,26c-0.6,1.6-1.5,3-2.6,4.1c-1.1,1.1-2.8,1.7-5,1.7
		 			c-0.5,0-1,0-1.4-0.1c-0.4-0.1-1-0.2-1.6-0.4l0.7-4.5c0.2,0,0.4,0.1,0.6,0.1c0.2,0,0.4,0,0.6,0c1,0,1.8-0.2,2.3-0.7
		 			c0.5-0.5,1-1.1,1.3-1.9l0.7-1.8l-8-22.6h6.6L187.8,158.8z"/>
		 		<path class="st1" d="M225,157.9l0,0.1c0.1,3.3-0.9,5.9-3,7.8c-2.1,1.9-4.9,2.9-8.6,2.9c-3.7,0-6.6-1.2-8.9-3.5
		 			c-2.3-2.4-3.4-5.4-3.4-9.1v-6c0-3.7,1.1-6.7,3.3-9.1c2.2-2.4,5.1-3.6,8.7-3.6c3.8,0,6.7,1,8.8,2.9c2.1,1.9,3.2,4.6,3.1,7.9l0,0.1
		 			h-5.9c0-2-0.5-3.5-1.4-4.6c-1-1.1-2.5-1.6-4.5-1.6c-1.8,0-3.3,0.7-4.4,2.2c-1.1,1.5-1.6,3.4-1.6,5.7v6.1c0,2.3,0.6,4.2,1.7,5.7
		 			c1.1,1.5,2.7,2.2,4.6,2.2c1.9,0,3.3-0.5,4.2-1.5s1.4-2.5,1.4-4.6H225z"/>
		 		<path class="st1" d="M227.9,156.8c0-3.4,0.9-6.1,2.8-8.3c1.9-2.2,4.5-3.2,7.8-3.2c3.3,0,6,1.1,7.9,3.2s2.8,4.9,2.8,8.3v0.4
		 			c0,3.4-0.9,6.2-2.8,8.3c-1.9,2.1-4.5,3.2-7.8,3.2c-3.3,0-6-1.1-7.9-3.2c-1.9-2.1-2.8-4.9-2.8-8.3V156.8z M234,157.2
		 			c0,2.1,0.4,3.7,1.1,5s1.9,1.9,3.5,1.9c1.6,0,2.7-0.6,3.5-1.9s1.1-2.9,1.1-5v-0.4c0-2-0.4-3.6-1.1-4.9c-0.7-1.3-1.9-1.9-3.5-1.9
		 			c-1.6,0-2.7,0.6-3.5,1.9c-0.7,1.3-1.1,2.9-1.1,4.9V157.2z"/>
		 		<path class="st1" d="M252.1,157.2c0-3.6,0.8-6.5,2.3-8.6c1.5-2.2,3.7-3.3,6.5-3.3c1.1,0,2.1,0.2,3.1,0.7c0.9,0.5,1.7,1.2,2.4,2.1
		 			v-12.4h6.1v32.7h-5.3l-0.5-2.8c-0.7,1-1.6,1.8-2.5,2.4c-1,0.5-2.1,0.8-3.3,0.8c-2.8,0-4.9-1-6.5-3.1c-1.5-2-2.3-4.7-2.3-8.1V157.2
		 			z M258.2,157.6c0,2,0.3,3.6,1,4.7c0.7,1.1,1.8,1.7,3.3,1.7c0.9,0,1.6-0.2,2.3-0.5c0.7-0.4,1.2-0.9,1.6-1.6v-9.7
		 			c-0.4-0.7-1-1.3-1.6-1.7c-0.6-0.4-1.4-0.6-2.3-0.6c-1.5,0-2.6,0.7-3.3,2c-0.7,1.3-1,3.1-1,5.2V157.6z"/>
		 		<path class="st1" d="M287.3,168.7c-3.3,0-5.9-1-7.8-3.1c-2-2.1-2.9-4.8-2.9-8v-0.8c0-3.4,0.9-6.1,2.8-8.3c1.8-2.2,4.3-3.3,7.4-3.2
		 			c3.1,0,5.4,0.9,7.1,2.8c1.7,1.8,2.5,4.3,2.5,7.5v3.3h-13.5l0,0.1c0.1,1.5,0.6,2.7,1.5,3.7c0.9,1,2.1,1.4,3.6,1.4
		 			c1.4,0,2.5-0.1,3.4-0.4c0.9-0.3,1.9-0.7,2.9-1.3l1.7,3.8c-0.9,0.8-2.1,1.4-3.6,1.9C290.8,168.5,289.1,168.7,287.3,168.7z
		 			 M286.8,149.9c-1.1,0-2,0.4-2.7,1.3c-0.7,0.9-1.1,2-1.2,3.4l0.1,0.1h7.5v-0.5c0-1.3-0.3-2.3-0.9-3.1
		 			C288.9,150.3,288,149.9,286.8,149.9z"/>
		 	</g>
		 	<g id="morse">
		 		<g>
		 			<path class="st0" d="M39.1,131v-6.7h24.7v6.7H39.1z M70.3,128.2c0-1.9,1.1-2.9,3.3-2.9c2.2,0,3.3,1,3.3,2.9
		 				c0,1.9-1.1,2.9-3.3,2.9C71.4,131,70.3,130.1,70.3,128.2z M84.6,127.7c0-2.2,1.1-3.3,3.3-3.3c2.2,0,3.3,1.1,3.3,3.3
		 				c0,2.2-1.1,3.3-3.3,3.3C85.7,131,84.6,129.9,84.6,127.7z"/>
		 			<path class="st0" d="M108.8,131v-6.7h24.7v6.7H108.8z M141.1,127.7c0-2.2,1.1-3.3,3.3-3.3c2.2,0,3.3,1.1,3.3,3.3
		 				c0,2.2-1.1,3.3-3.3,3.3C142.2,131,141.1,129.9,141.1,127.7z M156.3,127.7c0-2.2,1.1-3.3,3.3-3.3c2.2,0,3.3,1.1,3.3,3.3
		 				c0,2.2-1.1,3.3-3.3,3.3C157.4,131,156.3,129.9,156.3,127.7z M169.6,127.7c0-2.2,1.3-3.3,3.8-3.3c2.5,0,3.7,1.1,3.7,3.3
		 				c0,2.2-1.2,3.3-3.7,3.3C170.9,131,169.6,129.9,169.6,127.7z"/>
		 			<path class="st0" d="M197.4,131v-6.7h23.8v6.7H197.4z M227.8,127.7c0-2.2,1.1-3.3,3.3-3.3c2.2,0,3.3,1.1,3.3,3.3
		 				c0,2.2-1.1,3.3-3.3,3.3C228.9,131,227.8,129.9,227.8,127.7z M242,131v-6.7h21.8v6.7H242z M270.5,127.7c0-2.2,1.1-3.3,3.3-3.3
		 				c2.2,0,3.3,1.1,3.3,3.3c0,2.2-1.1,3.3-3.3,3.3C271.7,131,270.5,129.9,270.5,127.7z"/>
		 		</g>
		 	</g>
		 </g>
		 <g>
		 	<path class="st2" d="M21.6,193.6H22l2.4,5.6l2.5-5.6h0.5l-2.7,6.1l3.6,8.2l6.3-14.5h0.5l-6.5,15h-0.5l-3.6-8.2l-3.6,8.2h-0.5
		 		l-6.5-15h0.5l6.3,14.5l3.6-8.2L21.6,193.6z"/>
		 	<path class="st2" d="M40.4,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.9-1.1-1.1-1.8s-0.4-1.4-0.4-2.2
		 		c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.4,2-0.4c0.7,0,1.4,0.1,2.1,0.4
		 		c0.6,0.3,1.2,0.7,1.7,1.2c0.5,0.5,0.8,1.1,1.1,1.8s0.4,1.4,0.4,2.2v0.2h-10c0.1,0.7,0.2,1.4,0.5,2c0.3,0.6,0.6,1.1,1.1,1.6
		 		c0.4,0.5,0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.8,0.4c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.8-0.3,1.1-0.5s0.7-0.4,0.9-0.7
		 		c0.3-0.3,0.5-0.6,0.6-0.9l0.4,0.1c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.6,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.3,0.5
		 		C41.3,208.7,40.8,208.7,40.4,208.7z M45.1,202.8c0-0.7-0.2-1.4-0.5-2c-0.3-0.6-0.6-1.2-1-1.6s-0.9-0.8-1.5-1s-1.2-0.4-1.8-0.4
		 		c-0.6,0-1.3,0.1-1.8,0.4s-1.1,0.6-1.5,1.1s-0.8,1-1,1.6c-0.3,0.6-0.4,1.3-0.4,2H45.1z"/>
		 	<path class="st2" d="M52.8,208.7c-0.4,0-0.9-0.1-1.3-0.2c-0.4-0.1-0.8-0.3-1.2-0.5c-0.4-0.2-0.7-0.5-1-0.8c-0.3-0.3-0.6-0.6-0.8-1
		 		v2.3h-0.4v-15.4h0.4v7c0.6-0.8,1.2-1.4,1.9-2c0.7-0.5,1.6-0.8,2.5-0.8c0.8,0,1.5,0.2,2.2,0.5c0.6,0.3,1.2,0.8,1.6,1.3
		 		c0.4,0.5,0.8,1.2,1,1.8c0.2,0.7,0.3,1.4,0.3,2c0,0.7-0.1,1.5-0.4,2.1c-0.3,0.7-0.6,1.3-1.1,1.8s-1,0.9-1.7,1.2
		 		C54.2,208.6,53.5,208.7,52.8,208.7z M52.8,208.3c0.7,0,1.4-0.2,2-0.5c0.6-0.3,1.1-0.7,1.5-1.2s0.8-1.1,1-1.7
		 		c0.2-0.6,0.4-1.3,0.4-1.9c0-0.7-0.1-1.3-0.3-2c-0.2-0.6-0.5-1.2-1-1.7c-0.4-0.5-0.9-0.9-1.5-1.2c-0.6-0.3-1.2-0.4-1.9-0.4
		 		c-0.5,0-1,0.1-1.5,0.3c-0.5,0.2-0.9,0.4-1.2,0.7s-0.7,0.6-1,1c-0.3,0.4-0.5,0.8-0.8,1.2v4c0,0.5,0.2,0.9,0.5,1.3
		 		c0.3,0.4,0.6,0.8,1.1,1.1c0.4,0.3,0.9,0.5,1.4,0.7C51.9,208.2,52.3,208.3,52.8,208.3z"/>
		 	<path class="st2" d="M70.8,208.7c-0.8,0-1.5-0.2-2.1-0.5c-0.6-0.3-1.2-0.8-1.7-1.3c-0.5-0.5-0.8-1.1-1.1-1.8
		 		c-0.3-0.7-0.4-1.4-0.4-2.1c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.5,2-0.5
		 		c0.5,0,1,0.1,1.4,0.2c0.4,0.1,0.9,0.3,1.2,0.6s0.7,0.5,1,0.9c0.3,0.3,0.6,0.7,0.8,1v-7h0.4v14.6c0,0.3,0.1,0.4,0.3,0.4v0.4
		 		c-0.1,0-0.2,0-0.3,0c-0.2-0.1-0.3-0.2-0.4-0.3c-0.1-0.1-0.1-0.3-0.1-0.5v-1.4c-0.2,0.4-0.5,0.7-0.8,1c-0.3,0.3-0.7,0.6-1,0.8
		 		c-0.4,0.2-0.8,0.4-1.2,0.5C71.6,208.7,71.2,208.7,70.8,208.7z M70.8,208.3c0.4,0,0.9-0.1,1.4-0.3c0.5-0.2,1-0.4,1.4-0.7
		 		c0.4-0.3,0.8-0.7,1.1-1.1c0.3-0.4,0.4-0.8,0.5-1.3v-4c-0.2-0.4-0.4-0.8-0.7-1.2s-0.7-0.7-1.1-1c-0.4-0.3-0.8-0.5-1.3-0.7
		 		s-0.9-0.3-1.4-0.3c-0.7,0-1.4,0.2-1.9,0.5c-0.6,0.3-1.1,0.7-1.5,1.2c-0.4,0.5-0.7,1.1-0.9,1.7c-0.2,0.6-0.3,1.3-0.3,1.9
		 		c0,0.7,0.1,1.3,0.4,2c0.3,0.6,0.6,1.2,1,1.7c0.4,0.5,1,0.9,1.5,1.2C69.5,208.2,70.1,208.3,70.8,208.3z"/>
		 	<path class="st2" d="M83.6,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.9-1.1-1.1-1.8s-0.4-1.4-0.4-2.2
		 		c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.4,2-0.4c0.7,0,1.4,0.1,2.1,0.4
		 		c0.6,0.3,1.2,0.7,1.7,1.2c0.5,0.5,0.8,1.1,1.1,1.8s0.4,1.4,0.4,2.2v0.2h-10c0.1,0.7,0.2,1.4,0.5,2c0.3,0.6,0.6,1.1,1.1,1.6
		 		c0.4,0.5,0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.8,0.4c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.8-0.3,1.1-0.5s0.7-0.4,0.9-0.7
		 		c0.3-0.3,0.5-0.6,0.6-0.9l0.4,0.1c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.6,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.3,0.5
		 		C84.5,208.7,84,208.7,83.6,208.7z M88.3,202.8c0-0.7-0.2-1.4-0.5-2c-0.3-0.6-0.6-1.2-1-1.6s-0.9-0.8-1.5-1s-1.2-0.4-1.8-0.4
		 		c-0.6,0-1.3,0.1-1.8,0.4s-1.1,0.6-1.5,1.1s-0.8,1-1,1.6c-0.3,0.6-0.4,1.3-0.4,2H88.3z"/>
		 	<path class="st2" d="M94.4,208.7c-1.7,0-3.1-0.6-4.2-1.8l0.3-0.3c0.6,0.5,1.2,1,1.8,1.2c0.6,0.3,1.3,0.4,2.1,0.4
		 		c1.1,0,2-0.2,2.6-0.7c0.7-0.5,1-1.1,1-2c0-0.4-0.1-0.7-0.3-1c-0.2-0.3-0.4-0.5-0.7-0.7c-0.3-0.2-0.7-0.4-1.2-0.5
		 		c-0.5-0.1-1-0.3-1.6-0.4c-0.6-0.1-1.1-0.3-1.5-0.4c-0.4-0.1-0.8-0.3-1.1-0.5c-0.3-0.2-0.5-0.4-0.7-0.7c-0.1-0.3-0.2-0.6-0.2-1.1
		 		c0-0.5,0.1-1,0.3-1.4c0.2-0.4,0.5-0.7,0.8-1s0.8-0.4,1.2-0.6c0.5-0.1,1-0.2,1.5-0.2c0.9,0,1.6,0.2,2.3,0.5c0.6,0.3,1.1,0.7,1.3,1.1
		 		l-0.4,0.2c-0.3-0.4-0.7-0.8-1.3-1c-0.6-0.2-1.3-0.3-2-0.3c-0.5,0-0.9,0-1.3,0.1s-0.8,0.3-1.1,0.5s-0.6,0.5-0.7,0.8
		 		s-0.3,0.7-0.3,1.2c0,0.4,0.1,0.7,0.2,0.9s0.3,0.4,0.6,0.6c0.3,0.2,0.6,0.3,1,0.4c0.4,0.1,0.9,0.2,1.4,0.4c0.6,0.2,1.2,0.3,1.8,0.4
		 		c0.5,0.1,1,0.3,1.3,0.5c0.4,0.2,0.6,0.5,0.8,0.8c0.2,0.3,0.3,0.7,0.3,1.2c0,0.5-0.1,0.9-0.3,1.3s-0.5,0.7-0.8,1
		 		c-0.4,0.3-0.8,0.5-1.3,0.6C95.6,208.6,95,208.7,94.4,208.7z"/>
		 	<path class="st2" d="M101.2,194.7v-1.6h0.4v1.6H101.2z M101.2,208.5v-11h0.4v11H101.2z"/>
		 	<path class="st2" d="M109.7,208.7c-0.8,0-1.5-0.2-2.1-0.5c-0.6-0.3-1.2-0.8-1.7-1.3c-0.5-0.5-0.8-1.1-1.1-1.8
		 		c-0.3-0.7-0.4-1.4-0.4-2.1c0-0.7,0.1-1.4,0.4-2.1c0.2-0.7,0.6-1.3,1-1.8s1-1,1.6-1.3c0.6-0.3,1.3-0.5,2.1-0.5c0.5,0,1,0.1,1.4,0.2
		 		s0.8,0.3,1.2,0.6c0.4,0.2,0.7,0.5,1,0.9c0.3,0.3,0.6,0.7,0.9,1.1v-2.6h0.4V209c0,0.7-0.1,1.3-0.4,1.9c-0.3,0.5-0.6,1-1.1,1.3
		 		c-0.5,0.4-1,0.6-1.6,0.8s-1.2,0.3-1.8,0.3c-1.3,0-2.3-0.2-3-0.7c-0.7-0.5-1.3-1.1-1.7-1.9l0.4-0.1c0.5,0.8,1.1,1.4,1.8,1.8
		 		s1.6,0.5,2.5,0.5c0.6,0,1.2-0.1,1.7-0.2c0.5-0.2,1-0.4,1.4-0.7c0.4-0.3,0.7-0.7,1-1.2c0.2-0.5,0.3-1,0.3-1.7v-2.7
		 		c-0.2,0.4-0.5,0.7-0.8,1c-0.3,0.3-0.7,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.2,0.5C110.5,208.7,110.1,208.7,109.7,208.7z M109.7,208.3
		 		c0.5,0,1-0.1,1.5-0.3s0.9-0.5,1.3-0.8c0.4-0.3,0.7-0.7,1-1.1c0.3-0.4,0.4-0.8,0.4-1.2v-4c-0.2-0.5-0.4-0.9-0.7-1.3s-0.7-0.7-1.1-1
		 		s-0.8-0.5-1.3-0.7c-0.5-0.2-0.9-0.2-1.4-0.2c-0.7,0-1.4,0.2-2,0.5c-0.6,0.3-1.1,0.7-1.5,1.2c-0.4,0.5-0.7,1.1-0.9,1.7
		 		c-0.2,0.6-0.3,1.3-0.3,1.9c0,0.7,0.1,1.3,0.4,2c0.3,0.6,0.6,1.2,1,1.7c0.4,0.5,1,0.9,1.5,1.2C108.3,208.2,109,208.3,109.7,208.3z"
		 		/>
		 	<path class="st2" d="M126.4,208.5H126v-6.1c0-1.6-0.2-2.8-0.7-3.5s-1.2-1.1-2.1-1.1c-0.5,0-1.1,0.1-1.6,0.3c-0.5,0.2-1,0.5-1.4,0.8
		 		c-0.4,0.3-0.8,0.7-1.1,1.2c-0.3,0.5-0.6,1-0.7,1.5v6.9h-0.4v-11h0.4v2.8c0.2-0.4,0.5-0.8,0.9-1.2s0.7-0.7,1.2-1
		 		c0.4-0.3,0.9-0.5,1.4-0.6c0.5-0.1,1-0.2,1.5-0.2c1.1,0,2,0.4,2.5,1.2c0.5,0.8,0.8,2.1,0.8,3.8V208.5z"/>
		 	<path class="st2" d="M138,208.7c-0.5,0-1-0.1-1.4-0.3c-0.4-0.2-0.8-0.4-1.1-0.7c-0.3-0.3-0.6-0.7-0.8-1.1c-0.2-0.4-0.3-0.8-0.3-1.3
		 		s0.1-0.9,0.3-1.3c0.2-0.4,0.5-0.7,0.9-1c0.4-0.3,0.9-0.5,1.4-0.6c0.6-0.2,1.2-0.2,1.8-0.2c0.6,0,1.3,0.1,1.9,0.2s1.2,0.3,1.8,0.5
		 		v-1.2c0-0.6-0.1-1.1-0.3-1.6c-0.2-0.5-0.4-0.9-0.7-1.2s-0.7-0.6-1.1-0.8c-0.4-0.2-0.9-0.3-1.5-0.3c-0.5,0-1.1,0.1-1.7,0.3
		 		c-0.6,0.2-1.2,0.6-1.8,1l-0.3-0.3c1.4-1,2.7-1.4,3.8-1.4c0.6,0,1.2,0.1,1.7,0.3s0.9,0.5,1.3,0.8c0.3,0.4,0.6,0.8,0.8,1.3
		 		c0.2,0.5,0.3,1.1,0.3,1.8v6.1c0,0.3,0.1,0.4,0.3,0.4v0.4c-0.2,0-0.3,0-0.3,0c-0.1-0.1-0.3-0.2-0.3-0.3s-0.1-0.3-0.1-0.5v-1
		 		c-0.5,0.7-1.2,1.2-2,1.5C139.8,208.5,138.9,208.7,138,208.7z M138,208.3c0.9,0,1.8-0.2,2.6-0.5c0.8-0.4,1.4-0.8,1.7-1.4
		 		c0.2-0.3,0.3-0.6,0.3-0.9v-2.2c-1.1-0.4-2.4-0.7-3.7-0.7c-0.6,0-1.2,0.1-1.7,0.2s-0.9,0.3-1.3,0.5c-0.4,0.2-0.6,0.5-0.8,0.9
		 		s-0.3,0.7-0.3,1.1s0.1,0.8,0.2,1.2c0.2,0.4,0.4,0.7,0.7,0.9s0.6,0.5,1,0.6C137.1,208.2,137.5,208.3,138,208.3z"/>
		 	<path class="st2" d="M155,208.5h-0.4v-6.1c0-1.6-0.2-2.8-0.7-3.5s-1.2-1.1-2.1-1.1c-0.5,0-1.1,0.1-1.6,0.3c-0.5,0.2-1,0.5-1.4,0.8
		 		c-0.4,0.3-0.8,0.7-1.1,1.2c-0.3,0.5-0.6,1-0.7,1.5v6.9h-0.4v-11h0.4v2.8c0.2-0.4,0.5-0.8,0.9-1.2s0.7-0.7,1.2-1
		 		c0.4-0.3,0.9-0.5,1.4-0.6c0.5-0.1,1-0.2,1.5-0.2c1.1,0,2,0.4,2.5,1.2c0.5,0.8,0.8,2.1,0.8,3.8V208.5z"/>
		 	<path class="st2" d="M162.9,208.7c-0.8,0-1.5-0.2-2.1-0.5c-0.6-0.3-1.2-0.8-1.7-1.3c-0.5-0.5-0.8-1.1-1.1-1.8
		 		c-0.3-0.7-0.4-1.4-0.4-2.1c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.5,2-0.5
		 		c0.5,0,1,0.1,1.4,0.2c0.4,0.1,0.9,0.3,1.2,0.6s0.7,0.5,1,0.9c0.3,0.3,0.6,0.7,0.8,1v-7h0.4v14.6c0,0.3,0.1,0.4,0.3,0.4v0.4
		 		c-0.1,0-0.2,0-0.3,0c-0.2-0.1-0.3-0.2-0.4-0.3c-0.1-0.1-0.1-0.3-0.1-0.5v-1.4c-0.2,0.4-0.5,0.7-0.8,1c-0.3,0.3-0.7,0.6-1,0.8
		 		c-0.4,0.2-0.8,0.4-1.2,0.5C163.7,208.7,163.3,208.7,162.9,208.7z M162.9,208.3c0.4,0,0.9-0.1,1.4-0.3c0.5-0.2,1-0.4,1.4-0.7
		 		c0.4-0.3,0.8-0.7,1.1-1.1c0.3-0.4,0.4-0.8,0.5-1.3v-4c-0.2-0.4-0.4-0.8-0.7-1.2s-0.7-0.7-1.1-1c-0.4-0.3-0.8-0.5-1.3-0.7
		 		s-0.9-0.3-1.4-0.3c-0.7,0-1.4,0.2-1.9,0.5c-0.6,0.3-1.1,0.7-1.5,1.2c-0.4,0.5-0.7,1.1-0.9,1.7c-0.2,0.6-0.3,1.3-0.3,1.9
		 		c0,0.7,0.1,1.3,0.4,2c0.3,0.6,0.6,1.2,1,1.7c0.4,0.5,1,0.9,1.5,1.2C161.6,208.2,162.2,208.3,162.9,208.3z"/>
		 	<path class="st2" d="M181.1,208.7c-0.8,0-1.5-0.2-2.1-0.5c-0.6-0.3-1.2-0.8-1.7-1.3c-0.5-0.5-0.8-1.1-1.1-1.8
		 		c-0.3-0.7-0.4-1.4-0.4-2.1c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.5,2-0.5
		 		c0.5,0,1,0.1,1.4,0.2c0.4,0.1,0.9,0.3,1.2,0.6s0.7,0.5,1,0.9c0.3,0.3,0.6,0.7,0.8,1v-7h0.4v14.6c0,0.3,0.1,0.4,0.3,0.4v0.4
		 		c-0.1,0-0.2,0-0.3,0c-0.2-0.1-0.3-0.2-0.4-0.3c-0.1-0.1-0.1-0.3-0.1-0.5v-1.4c-0.2,0.4-0.5,0.7-0.8,1c-0.3,0.3-0.7,0.6-1,0.8
		 		c-0.4,0.2-0.8,0.4-1.2,0.5C182,208.7,181.6,208.7,181.1,208.7z M181.1,208.3c0.4,0,0.9-0.1,1.4-0.3c0.5-0.2,1-0.4,1.4-0.7
		 		c0.4-0.3,0.8-0.7,1.1-1.1c0.3-0.4,0.4-0.8,0.5-1.3v-4c-0.2-0.4-0.4-0.8-0.7-1.2s-0.7-0.7-1.1-1c-0.4-0.3-0.8-0.5-1.3-0.7
		 		s-0.9-0.3-1.4-0.3c-0.7,0-1.4,0.2-1.9,0.5c-0.6,0.3-1.1,0.7-1.5,1.2c-0.4,0.5-0.7,1.1-0.9,1.7c-0.2,0.6-0.3,1.3-0.3,1.9
		 		c0,0.7,0.1,1.3,0.4,2c0.3,0.6,0.6,1.2,1,1.7c0.4,0.5,1,0.9,1.5,1.2C179.8,208.2,180.5,208.3,181.1,208.3z"/>
		 	<path class="st2" d="M193.9,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.9-1.1-1.1-1.8s-0.4-1.4-0.4-2.2
		 		c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.4,2-0.4c0.7,0,1.4,0.1,2.1,0.4
		 		c0.6,0.3,1.2,0.7,1.7,1.2c0.5,0.5,0.8,1.1,1.1,1.8s0.4,1.4,0.4,2.2v0.2h-10c0.1,0.7,0.2,1.4,0.5,2c0.3,0.6,0.6,1.1,1.1,1.6
		 		c0.4,0.5,0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.8,0.4c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.8-0.3,1.1-0.5s0.7-0.4,0.9-0.7
		 		c0.3-0.3,0.5-0.6,0.6-0.9l0.4,0.1c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.6,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.3,0.5
		 		C194.9,208.7,194.4,208.7,193.9,208.7z M198.6,202.8c0-0.7-0.2-1.4-0.5-2c-0.3-0.6-0.6-1.2-1-1.6s-0.9-0.8-1.5-1s-1.2-0.4-1.8-0.4
		 		c-0.6,0-1.3,0.1-1.8,0.4s-1.1,0.6-1.5,1.1s-0.8,1-1,1.6c-0.3,0.6-0.4,1.3-0.4,2H198.6z"/>
		 	<path class="st2" d="M204.8,208.5l-4.8-11h0.5l4.5,10.4l4.5-10.4h0.5l-4.8,11H204.8z"/>
		 	<path class="st2" d="M216.4,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.9-1.1-1.1-1.8s-0.4-1.4-0.4-2.2
		 		c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.4,2-0.4c0.7,0,1.4,0.1,2.1,0.4
		 		c0.6,0.3,1.2,0.7,1.7,1.2c0.5,0.5,0.8,1.1,1.1,1.8s0.4,1.4,0.4,2.2v0.2h-10c0.1,0.7,0.2,1.4,0.5,2c0.3,0.6,0.6,1.1,1.1,1.6
		 		c0.4,0.5,0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.8,0.4c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.8-0.3,1.1-0.5s0.7-0.4,0.9-0.7
		 		c0.3-0.3,0.5-0.6,0.6-0.9l0.4,0.1c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.6,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.3,0.5
		 		C217.3,208.7,216.9,208.7,216.4,208.7z M221.1,202.8c0-0.7-0.2-1.4-0.5-2c-0.3-0.6-0.6-1.2-1-1.6s-0.9-0.8-1.5-1s-1.2-0.4-1.8-0.4
		 		c-0.6,0-1.3,0.1-1.8,0.4s-1.1,0.6-1.5,1.1s-0.8,1-1,1.6c-0.3,0.6-0.4,1.3-0.4,2H221.1z"/>
		 	<path class="st2" d="M224.2,193.1h0.4v13.8c0,0.4,0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4c0.2,0,0.3,0,0.6-0.1s0.4-0.1,0.6-0.1
		 		l0.1,0.3c-0.2,0.1-0.4,0.1-0.7,0.2c-0.3,0-0.5,0.1-0.7,0.1c-0.5,0-0.9-0.2-1.2-0.5c-0.3-0.3-0.5-0.7-0.5-1.3V193.1z"/>
		 	<path class="st2" d="M233.5,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.8-1.1-1.1-1.8
		 		c-0.3-0.7-0.4-1.4-0.4-2.2c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.7-1.3,1.1-1.8c0.5-0.5,1-0.9,1.7-1.2c0.6-0.3,1.3-0.5,2-0.5
		 		c0.7,0,1.4,0.2,2,0.5c0.6,0.3,1.2,0.7,1.7,1.2s0.8,1.1,1.1,1.8c0.3,0.7,0.4,1.4,0.4,2.2c0,0.8-0.1,1.5-0.4,2.2
		 		c-0.3,0.7-0.6,1.3-1.1,1.8c-0.5,0.5-1,0.9-1.7,1.2C234.9,208.6,234.2,208.7,233.5,208.7z M228.7,203.1c0,0.7,0.1,1.4,0.4,2
		 		c0.3,0.6,0.6,1.2,1,1.7s0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.9,0.4c0.6,0,1.3-0.1,1.8-0.4s1.1-0.7,1.5-1.1c0.4-0.5,0.8-1,1-1.7
		 		c0.3-0.6,0.4-1.3,0.4-2c0-0.7-0.1-1.4-0.4-2c-0.3-0.6-0.6-1.2-1-1.7c-0.4-0.5-0.9-0.9-1.5-1.1c-0.6-0.3-1.2-0.4-1.8-0.4
		 		s-1.3,0.1-1.8,0.4c-0.6,0.3-1.1,0.7-1.5,1.2c-0.4,0.5-0.8,1-1,1.7C228.9,201.7,228.7,202.4,228.7,203.1z"/>
		 	<path class="st2" d="M246.4,208.7c-0.5,0-1-0.1-1.4-0.2c-0.4-0.1-0.8-0.3-1.2-0.6c-0.4-0.2-0.7-0.5-1-0.9c-0.3-0.3-0.6-0.7-0.8-1v7
		 		h-0.4v-15.5h0.4v2.3c0.2-0.4,0.5-0.7,0.8-1c0.3-0.3,0.7-0.6,1-0.8c0.4-0.2,0.8-0.4,1.2-0.5c0.4-0.1,0.8-0.2,1.2-0.2
		 		c0.8,0,1.5,0.2,2.1,0.5c0.6,0.3,1.2,0.8,1.7,1.3c0.5,0.5,0.8,1.1,1.1,1.8c0.3,0.7,0.4,1.4,0.4,2.1c0,0.7-0.1,1.5-0.4,2.1
		 		c-0.2,0.7-0.6,1.3-1,1.8s-1,0.9-1.6,1.2C247.8,208.6,247.2,208.7,246.4,208.7z M246.4,208.3c0.7,0,1.4-0.2,1.9-0.5
		 		c0.6-0.3,1.1-0.7,1.5-1.2c0.4-0.5,0.7-1.1,0.9-1.7c0.2-0.6,0.3-1.3,0.3-1.9c0-0.7-0.1-1.4-0.4-2c-0.3-0.6-0.6-1.2-1-1.7
		 		c-0.4-0.5-1-0.9-1.5-1.2c-0.6-0.3-1.2-0.4-1.9-0.4c-0.4,0-0.9,0.1-1.4,0.3c-0.5,0.2-1,0.4-1.4,0.7c-0.4,0.3-0.8,0.7-1.1,1.1
		 		c-0.3,0.4-0.4,0.8-0.5,1.3v4c0.2,0.5,0.5,0.9,0.8,1.3c0.3,0.4,0.7,0.7,1,1c0.4,0.3,0.8,0.5,1.3,0.7
		 		C245.4,208.2,245.9,208.3,246.4,208.3z"/>
		 	<path class="st2" d="M270,208.5h-0.4v-6.1c0-1.6-0.2-2.7-0.7-3.5c-0.5-0.7-1.2-1.1-2.2-1.1c-0.5,0-1,0.1-1.5,0.3
		 		c-0.5,0.2-0.9,0.5-1.2,0.8c-0.4,0.3-0.7,0.7-1,1.2c-0.3,0.5-0.5,1-0.6,1.5v6.9h-0.4v-6.1c0-1.6-0.2-2.8-0.7-3.5
		 		c-0.5-0.7-1.2-1.1-2.2-1.1c-0.5,0-1,0.1-1.4,0.3c-0.5,0.2-0.9,0.4-1.2,0.8c-0.4,0.3-0.7,0.7-1,1.2s-0.5,1-0.7,1.5v6.9h-0.4v-11h0.4
		 		v2.8c0.5-1,1.1-1.7,1.8-2.2c0.7-0.5,1.5-0.8,2.4-0.8c0.9,0,1.7,0.3,2.3,0.9c0.6,0.6,0.9,1.4,1.1,2.3c1.1-2.1,2.6-3.2,4.4-3.2
		 		c1.1,0,2,0.4,2.5,1.2c0.5,0.8,0.8,2.1,0.8,3.8V208.5z"/>
		 	<path class="st2" d="M277.9,208.7c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1.2-0.7-1.7-1.2c-0.5-0.5-0.9-1.1-1.1-1.8s-0.4-1.4-0.4-2.2
		 		c0-0.8,0.1-1.5,0.4-2.2c0.3-0.7,0.6-1.3,1.1-1.8c0.5-0.5,1-0.9,1.6-1.2c0.6-0.3,1.3-0.4,2-0.4c0.7,0,1.4,0.1,2.1,0.4
		 		c0.6,0.3,1.2,0.7,1.7,1.2c0.5,0.5,0.8,1.1,1.1,1.8s0.4,1.4,0.4,2.2v0.2h-10c0.1,0.7,0.2,1.4,0.5,2c0.3,0.6,0.6,1.1,1.1,1.6
		 		c0.4,0.5,0.9,0.8,1.5,1.1c0.6,0.3,1.2,0.4,1.8,0.4c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.8-0.3,1.1-0.5s0.7-0.4,0.9-0.7
		 		c0.3-0.3,0.5-0.6,0.6-0.9l0.4,0.1c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.6,0.6-1,0.8c-0.4,0.2-0.8,0.4-1.3,0.5
		 		C278.8,208.7,278.4,208.7,277.9,208.7z M282.6,202.8c0-0.7-0.2-1.4-0.5-2c-0.3-0.6-0.6-1.2-1-1.6s-0.9-0.8-1.5-1s-1.2-0.4-1.8-0.4
		 		c-0.6,0-1.3,0.1-1.8,0.4s-1.1,0.6-1.5,1.1s-0.8,1-1,1.6c-0.3,0.6-0.4,1.3-0.4,2H282.6z"/>
		 	<path class="st2" d="M294.1,208.5h-0.4v-6.1c0-1.6-0.2-2.8-0.7-3.5s-1.2-1.1-2.1-1.1c-0.5,0-1.1,0.1-1.6,0.3
		 		c-0.5,0.2-1,0.5-1.4,0.8c-0.4,0.3-0.8,0.7-1.1,1.2c-0.3,0.5-0.6,1-0.7,1.5v6.9h-0.4v-11h0.4v2.8c0.2-0.4,0.5-0.8,0.9-1.2
		 		s0.7-0.7,1.2-1c0.4-0.3,0.9-0.5,1.4-0.6c0.5-0.1,1-0.2,1.5-0.2c1.1,0,2,0.4,2.5,1.2c0.5,0.8,0.8,2.1,0.8,3.8V208.5z"/>
		 	<path class="st2" d="M301.7,208c-0.2,0.1-0.4,0.2-0.6,0.3c-0.2,0.1-0.4,0.1-0.6,0.2s-0.5,0.1-0.8,0.1c-0.5,0-1-0.2-1.3-0.5
		 		c-0.4-0.3-0.6-0.7-0.6-1.2v-9h-1.6v-0.4h1.6v-3.8h0.4v3.8h2.6v0.4h-2.6v9c0,0.4,0.2,0.7,0.5,0.9c0.3,0.2,0.6,0.3,1,0.3
		 		c0.2,0,0.5,0,0.7-0.1c0.2,0,0.4-0.1,0.6-0.2s0.3-0.1,0.4-0.2c0.1-0.1,0.1-0.1,0.2-0.1L301.7,208z"/>
		 </g>
		 <line class="st3" x1="13.5" y1="184.1" x2="302.4" y2="184.1"/>
		 </svg>


					</a>
				</div>
				<div class="md-col-4">

				</div>
				<div class="md-col-4">
					<!-- <div class="admin-video-card-header">
						<div class="video-cover"></div>
					</div> -->
				</div>
			</div>
		</div>
	</header>
	<?php
}


function renderNavbar(){
	?>
	<nav class="admin-nav">
		<div class="wrapper">
			<div class="row">
				<div class="md-col-12">
					<ul>
						<li class="active-services" ><a href="?page=design-by-code">Services</a></li>
						<!-- <li class="active-about" ><a href="?page=designbycode-about">About</a></li> -->
						<li class="active-settings" ><a href="?page=designbycode-settings">Settings</a></li>
						<!-- <li class="active-rp" ><a href="?page=designbycode-recommended">Recommended Products</a></li> -->
						<!-- <li class="active-tutorials" ><a href="?page=designbycode-tutorials">Tutorials</a></li> -->
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<?php
}




/**************************
* Add menu to the admin bar
**************************/

function dbc_add_link_to_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id' => 'designbycode_website',
		'title' => 'DESIGN BY CODE',
		'href' => 'http://designbycode.co.za'
	));
	$wp_admin_bar->add_menu(array(
		'id' => 'everhost_website',
		'title' => 'EVERHOST',
		'href' => 'https://everhost.co.za'
	));
}

add_action('wp_before_admin_bar_render', 'dbc_add_link_to_admin_bar');
