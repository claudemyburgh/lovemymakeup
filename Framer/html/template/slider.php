
<?php if ( is_front_page() ) :?>
<div class="heading-text-box">
<h2 class="heading">SHOP YOUR MAKEUP </h2>
<div class="heading-text-box__devider"></div>
</div>
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => '12',
			'orderby' => 'rand'

		);

		$image_loop = new WP_Query($args);
	 ?>

<aside class="slider">
	<div id="owl-carousel-div">
		<?php if($image_loop->have_posts()): ?>
			<?php while($image_loop->have_posts() ): $image_loop->the_post();?>
				<div class="item"><a href="<?php the_permalink(); ?>">
					<img class="lazyOwl" data-src="<?php echo $p = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel', false)[0]; ?>"
					 alt="" />
				</a></div>
				 <?php //echo '<pre>', var_dump($p) , '</pre>'; ?>
			<?php endwhile; ?>
		<?php endif;
		wp_reset_postdata(); ?>
	</div>
</aside>
<?php endif;?>

<?php


 ?>
