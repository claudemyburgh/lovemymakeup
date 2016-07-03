<?php


define('THEMEROOT', get_stylesheet_uri());
define('ROOT', get_template_directory_uri());
define('IMAGES', ROOT .'/img/' );
define('WEBP', ROOT .'/webp/' );
define('VIDEOS', ROOT .'/videos/' );
define('NAME', 'lovemymakeup');

// $result = add_role(
// 	'client',
// 	__('Client', 'lovemymakeup'),
// 	array(
// 		'read' => true,
// 		'edit_posts' => true,
// 		'delete_posts' => true,
// 		'edit_themes_options' => true,
// 		'manage_options' => true
// 		)
// 	);
//



//add_filter('woocommerce_enqueue_styles', '__return_false');


load_template(get_template_directory() .'/libs/CustomPostType.php');
//load_template(get_template_directory() .'/libs/Taxonomy.php');
load_template(get_template_directory() .'/libs/WalkerMenu.php');
load_template(get_template_directory() .'/libs/designbycode.php');
load_template(get_template_directory() .'/inc/settings-api.php');
load_template(get_template_directory() .'/inc/customizer.php');

//load_template(get_template_directory() .'/inc/my_custom_functions.php');



// Add style sheet
function lovemymakeup_resources(){
	wp_enqueue_style('style', THEMEROOT , array('dashicons'));
  wp_enqueue_script('app', ROOT . '/js/app.js', array(), false, '2.1.4', true);
  wp_enqueue_script('moder', ROOT . '/js/modernizr-custom.js', array(), false, false);
}

add_action('wp_enqueue_scripts', 'lovemymakeup_resources');




function lovemymakeup_setup(){
	add_theme_support( 'automatic-feed-links' );


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Framer Starter, use a find and replace
	 * to change 'framerstarter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lovemymakeup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );


	add_theme_support( 'post-thumbnails');
	add_image_size('small-tumbnail', 250, 250, true);
	add_image_size('carousel', 280, 400, true);
	add_image_size('banner-image', 1000, 250, true);


}

add_action('after_setup_theme', 'lovemymakeup_setup');



//teh excerpt

function custom_excerpt_length($len){
	return 60;
}

add_filter('excerpt_length', 'custom_excerpt_length');



// Navigation Menus

register_nav_menus(array(
	'primary' => __('Primary Menu', NAME),
	'footer' => __('Footer Menu', NAME),

	));


//$custom_post = new CustomPostType('lovemymakeup');
//$custom_post->make('training', 'training', 'Training ', array('menu_icon' => 'dashicons-welcome-learn-more'));

//load_template(get_template_directory() .'/inc/wp-training.php');



/*  EXCERPT
    Usage:

    <?php echo excerpt(100); ?>
*/

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}



// $custom_tax = new Taxonomy('lovemymakeup');
// $custom_tax->make('areas','City', 'Cities', array('gallery'));


//widget
function lovemymakeup_widget_init(){
	register_sidebar(array(
		'name'	=> __('Store Sidebar', NAME),
		'id'		=>	'store' ,
		'before_widget' => '<div class="store-widtget ">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name'	=> __('Product Search Page', NAME),
		'id'		=>	'product-search',
		'before_widget' => '<div class="product-search-widget ">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="primary-h1">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name'	=> __('Product Tag bottom Page', NAME),
		'id'		=>	'product-tagcloud',
		'before_widget' => '<div class="product-search-widget ">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="primary-h1">',
		'after_title' => '</h1>'
	));




}

//add_action('widgets_init', 'lovemymakeup_widget_init');


function my_theme_wrapper_start() {
  echo '<section id="main" class="wrapper padding">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);





/*****************************************
 * Load Custom Widgets
 *****************************************/
 require_once('widgets/contact-details.php');


 /**************************
 *  Short code
 **************************/

 function mailto_short($atts, $content = null){
	 $atts = shortcode_atts(
	 	array(
			'name' => "",
			'email' => ""
		), $atts
	 );
	 if(empty($atts['name'])){
		 $atts['name'] = $atts['email'];
	 }

	 $string = '<a href="mailto:'.$atts['email'].'">'. $atts['name'] .'</a>';
	return $string;
 }

 add_shortcode('mailto', 'mailto_short');

 function telto_short($atts, $content = null){
	 $atts = shortcode_atts(
	 	array(
			'number' => "061 924 8374",
		), $atts
	 );
	$string = '<a href="telto:'.str_replace(' ', '', $atts['number']).'">'.$atts['number'].'</a>';
	$string = str_replace('<p></p> ', '', $string);
	return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);

 }

 add_shortcode('tel', 'telto_short');

 function frIcon($atts){
	 $atts = shortcode_atts(
	 	array(
			'icon' => 'astrix'
		), $atts
	 );
	 return '<i class="fr fr-'.$atts['icon'].'"></i>';
 }

 add_shortcode('icon', 'frIcon');


 function short_link($atts){
	 $atts = shortcode_atts(
	 	array(
			'linkto' => '',
			'name' => ''
		), $atts
	 );
	 if(empty($atts['name'])){
		 $atts['name'] = $atts['linkto'];
	 }
	 $string = '<a href="http://'.$atts['linkto'].'" rel="nofollow" target="blank" title="'.$atts['name'].'">'.$atts['name'].'</a>';
	 $string = str_replace('<p></p> ', '', $string);
	 return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);
 }

 add_shortcode('link', 'short_link');


 add_shortcode('row', function($atts, $content = null){
		$string = '<div class="row">'.do_shortcode(trim($content)).'</div>';
		$string = str_replace('<p></p> ', '', $string);
		return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);
 });

 add_shortcode('col3', function($atts, $content = null){
		$atts = shortcode_atts(
			array(
				'align' => 'left'
			), $atts
		);
		$string = trim('<div class="md-col-4 md-text-align-'.$atts['align'].'">'.trim(do_shortcode($content)).'</div>');
		$string = str_replace('<p></p> ', '', $string);
		return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);
 });

 add_shortcode('col4', function($atts, $content = null){
		$atts = shortcode_atts(
			array(
				'align' => 'left'
			), $atts
		);
		$string = trim('<div class="md-col-3 md-text-align-'.$atts['align'].'">'.trim(do_shortcode($content)).'</div>');
		$string = str_replace('<p></p> ', '', $string);
		return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);
 });

 add_shortcode('col2', function($atts, $content = null){
		$atts = shortcode_atts(
			array(
				'align' => 'left'
			), $atts
		);
		$string = trim('<div class="md-col-6 md-text-align-'.$atts['align'].'">'.trim(do_shortcode($content)).'</div>');
		$string = str_replace('<p></p> ', '', $string);
		return preg_replace('/<p[^>]*>[\s*|&nbsp;]*<\/p>/','', $string);
 });


/**************************
* End shortcodes
**************************/



/**************************
* Ajax cart
**************************/


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();	?>
	<a class="woobuttons" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
		<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total();?>
	</a>
	<?php $fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}






/**************************
* woocommerce @hooks
**************************/

/* Remove opening link */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

/* Remove closing link */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

/* Remove Image */
//remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/* Remove Flash sale */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

/* Remove Title */
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10);

/* Remove Rating */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/* Remove Pricing */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

/* Remove Add to cart button */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


/* Add image wrap start */
add_action('woocommerce_before_shop_loop_item', 'dbc_image_wrap_start', 10);

/* End image wrap end */
add_action('woocommerce_after_shop_loop_item_title', 'dbc_image_wrap_end', 100);


/* Add backface */
add_action('woocommerce_before_shop_loop_item', 'dbc_start_frontface', 20);

/* End Backface */
add_action('woocommerce_after_shop_loop_item_title', 'dbc_end_frontface', 60);


/* Add backface */
add_action('woocommerce_after_shop_loop_item_title', 'dbc_start_backface', 70);

/* End Backface */
add_action('woocommerce_after_shop_loop_item_title', 'dbc_end_backface', 90);



/* Add opening link */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 72);
/* Add Title */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_title', 75);
/* Add closing link */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 77);

add_action('woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 21);

/* Add opening link */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 109);

/* Add Pricing after backface */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 110);
/* Add closing link */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 111);

add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 80);


/* SSL to single product */
add_action('woocommerce_single_product_summary', 'dbc_ssl_display', 42);

function dbc_ssl_display(){
	?>
		<img class="product_ssl" src="<?php echo IMAGES . 'RapidSSL_SEAL-90x50.gif'; ?>" />
	<?php
}


function dbc_start_backface(){
	?>
		<div class="backface">

	<?php
}

function dbc_end_backface(){
	?>
</div><!--backface-->
	<?php
}


function dbc_start_frontface(){
	?>
		<div class="frontface">
	<?php
}

function dbc_end_frontface(){
	?>
</div><!--backface-->
	<?php
}


function dbc_image_wrap_start(){
	?>
		<div class="image-wrap">
	<?php
}

function dbc_image_wrap_end(){
	?>
</div><!--image-wrap-->
	<?php
}





///variation images


// add_filter( 'wc_additional_variation_images_main_images_class', 'variation_swap_main_image_class' );
//
// function variation_swap_main_image_class() {
// 	return '#product-img-slider ul.slides';
// }
//
// add_filter( 'wc_additional_variation_images_gallery_images_class', 'variation_swap_gallery_image_class' );
//
// function variation_swap_gallery_image_class() {
// 	return '#product-img-nav ul.slides';
// }
//
// add_filter( 'wc_additional_variation_images_custom_swap', '__return_true' );
// add_filter( 'wc_additional_variation_images_custom_reset_swap', '__return_true' );
// add_filter( 'wc_additional_variation_images_custom_original_swap', '__return_true' );
// add_filter( 'wc_additional_variation_images_get_first_image', '__return_true' );
//
//
//
// add_action( 'wp_enqueue_scripts', 'wcavi_enqueue_script' );
//
// function wcavi_enqueue_script() {
// 	wp_enqueue_script( 'wcavi-custom-script', get_template_directory_uri() . '/js/wcavi-custom-script.js' );
// }




//apply_filters( 'wc_additional_variation_images_get_first_image', true )// set whether to get the first image as some sliders will need this.
//apply_filters( 'wc_additional_variation_images_gallery_images_class', string ) // set the class name of the container of your gallery thumbnails.
//apply_filters( 'wc_additional_variation_images_main_images_class', string ) // set the class name of the anchor container of the main featured image.
//apply_filters( 'wc_additional_variation_images_custom_swap', boolean ) //set if you want to use your own custom swap JS logic.
//apply_filters('‘wc_additional_variation_images_custom_original_swap', boolean ) // set if you want to use your own custom original swap JS logic.
//apply_filters( 'wc_additional_variation_images_custom_reset_swap', boolean ) // set if you want to use your own custom reset swap JS logic.
// trigger( 'wc_additional_variation_images_frontend_lightbox' ) // JS event trigger right before the lightbox is fired.
// trigger( 'wc_additional_variation_images_frontend_on_reset' ) // JS event trigger to apply custom reset logic.
// trigger( 'wc_additional_variation_images_frontend_image_swap_callback' ) // JS event trigger to apply custom image swap logic.
// trigger( 'wc_additional_variation_images_frontend_ajax_default_image_swap_callback' ) // JS event trigger to apply custom default image swap logic.
// trigger( 'wc_additional_variation_images_frontend_before_show_variation' ) // JS event trigger that fires right before show variation starts.
// trigger( 'wc_additional_variation_images_frontend_ajax_response_callback' ) // JS event trigger that fires right after image swap AJAX.
