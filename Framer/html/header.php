<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Framer_Starter
 */
global $woocommerce;
 $woo = $woocommerce;
 $items_in_cart = $woo->cart->get_cart_contents_count();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<!--[if IE 9]> <link rel="stylesheet" href="<?php echo ROOT . '/style-ie9.css'; ?>" media="screen" title="no title" charset="utf-8"> <![endif]-->
</head>
<body <?php body_class(); ?>>
<div class="wrapper main-wrapper"><!--start of main wrapper-->

  <header class="main-header">
    <h1 class="main-header_blog_name">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <!-- <?php echo get_bloginfo('name'); ?> -->
        <img src="<?php echo IMAGES . '/logo.jpg' ?>" alt="love my makeup logo" />
      </a>
    </h1>
    <div class="main-header_devider_strip"></div>
    <p>

      <?php echo __('NATIONAL SHIPPING', NAME); ?>

      <a href="#" class="woobutton"><?php echo  $items_in_cart; ?></a>
    </p>
  </header>

<?php get_template_part('template/top-menu', NAME); ?>
<?php if ('' !== get_theme_mod('lovemymakeup_banner_image')):?>
<?php get_template_part('template/hero', NAME); ?>
<?php endif; ?>
<?php get_template_part('template/slider', NAME); ?>
<?php get_template_part('template/woobar', NAME); ?>
