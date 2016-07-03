<?php
/* Template Name: category list*/



 ?>

<?php get_header(); ?>

	<section class="wrapper ">
		<section class="row">
			<article class="md-col-12 md-float-right">
				<div class="padding">
          <?php dynamic_sidebar('product-search'); ?>
					<?php get_template_part("template/category-list"); ?>

          <?php dynamic_sidebar('product-tagcloud'); ?>
				</div>
			</article>
		</section>
	</section>
<?php get_footer(); ?>
