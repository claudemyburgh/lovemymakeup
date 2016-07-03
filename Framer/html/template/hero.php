<?php
global $woocommerce;


 ?>
<?php if ( is_front_page() ) :?>
<aside class="hero">

  <?php if(get_theme_mod('lovemymakeup_hide_the_dot') === true): ?>
	<div class="the_dot">
		<span class="the_dot__heading"><?php echo (get_theme_mod('lovemymakeup_line_1_text') !== '') ? get_theme_mod('lovemymakeup_line_1_text') : 'SUMMER COLLECTION'; ?></span>
		<span class="the_dot__text the_dot_text_1"><?php echo (get_theme_mod('lovemymakeup_line_2_text') !== '') ? get_theme_mod('lovemymakeup_line_2_text') : 'Now in store'; ?></span>
		<span class="the_dot__text the_dot_text_2">​​<?php echo (get_theme_mod('lovemymakeup_line_3_text') !== '') ? get_theme_mod('lovemymakeup_line_3_text') : 'To get the look​​​ come'; ?></span>
		<span class="the_dot__text"><a href="<?php echo esc_url( site_url() . '/shop' ); ?>">​​Visit the Store <i class="fr fr-arrow-right"></i></a></span>
	</div>

  <?php endif; ?>

</aside>
<?php endif; ?>
