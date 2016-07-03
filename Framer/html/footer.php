<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author DesignByCode
 * @package lovemymakeup
 */

 $options = get_option('dbc_switches');
 $more = get_option('dbc_more_settings');



?>

<?php
$mailList = get_option( 'dbc_settings' );
if(isset($mailList['hide_footer']) && !empty($mailList['form_name']) && !empty($mailList['form_id'])){
  get_template_part('template/mailchimp');
}?>

<nav class="terms">
	<ul >

		<?php wp_nav_menu( array(
			'theme_location' => 'footer',
			'menu_id' => 'footer-menu',
		 ) ); ?>
	</ul>
</nav>

<footer class="main-footer">
		<div class="row">
			<div class="sm-col-12">
				<?php //echo __('&copy; 2016 Chiq Technique T/A LoveMyMakeup', NAME); ?>
        <?php echo (!empty($more['copyright'])) ? __($more['copyright'], NAME) : __('DesignByCode', NAME); ?>
					<ul class="sosial">
						<?php if(isset($options['sosial_icons'])): ?>
						<li><a target="blank" href="<?php echo $options['sosial_facebook']; ?>" class="sosial_facebook">Facebook</a></li>
						<li><a target="blank" href="<?php echo $options['sosial_twitter']; ?>" class="sosial_twitter">Twitter</a></li>
						<?php endif; ?>
						<li><a href="#" class="sosial_totop">ToTop</a></li>
					</ul>

			</div>

		</div><!--row-->
</footer>

<div class="designer">

	<div class="row">
		<?php echo sprintf( __( 'Designed and Developed by <a target="blank" href="%s">%s</a>', NAME ), 'http://designbycode.co.za', 'DesignByCode'); ?>
	</div>

</div>

</div><!--end of main wrapper-->


<!-- <a href="#" class="scrollToTop"> <i class="fr-arrow-up"></i> -->
<?php wp_footer(); ?>

<?php if(!empty($more['analytics'])): ?>
  <?php echo $more['analytics']; ?>
<?php endif; ?>


</body>
</html>
