
<?php global $woocommerce;
	$woo = $woocommerce;
	$items_in_cart = $woo->cart->get_cart_contents_count();
	$cart_total = $woo->cart->get_cart_total();
	$cart_url = $woo->cart->get_cart_url();
 ?>

<div class="woobar">
	<div class="wooheader">
		<a href="#" class="closeWoobar"><i class="fr fr-close"></i></a>
		<h2><?php echo __('Shop', NAME); ?></h2>
	</div>
	<?php get_product_search_form(); ?>

	<ul class="cart-ul">
		<li>
			<?php if ( is_user_logged_in() ) { ?>
			 <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e(sprintf('Welcome %1s', wp_get_current_user()->display_name ),NAME); ?>"><i class="fr fr-avatar-w"> </i><?php _e(sprintf('<span>Welcome %1s</span>', wp_get_current_user()->display_name ),NAME); ?></a>
			<?php }
			else { ?>
			 <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register',NAME); ?>"><i class="fr fr-avatar-m"> </i><?php _e('<span>Login/Register</span>',NAME); ?></a>
			<?php } ?>
		</li>
		<?php if ( is_user_logged_in() ): ?>

		<li><a href="<?php  echo esc_url( site_url() . '/my-account' ); ?>"><i class="fr fr-avatar-w"> </i> My Account</a></li>
		<?php endif; ?>
		<li>
			<a Title="Cart" href="<?php echo $cart_url; ?>"><i class="fr fr-shopping-cart"></i>
				<?php
				if($items_in_cart === 0){
					echo _e("<span>No items in cart</span> ", NAME);
				}elseif($items_in_cart === 1){
					echo _e("<span>Item in cart</span>" . " " . $items_in_cart, NAME);
				}else{
					echo _e("<span>Items in cart</span>" . " " . $items_in_cart, NAME);
				}
				?>
			</a>
		</li>
	</ul>


	<a class="woobar__ssl"  href="#">
		<img src="<?php echo IMAGES . '/RapidSSL_SEAL-90x50.gif' ?>" alt="Rapid SSL" />
	</a>



	<div class="wooFooter">
		<a href="<?php echo $cart_url; ?>" class="btn btn-alt">VIEW CART</a>
	</div>

</div>
