<?php get_header(); ?>
	<section class="">
		<section class="row">
			<article class="md-col-8 lg-col-9 ">
				<div class="padding">
					<?php get_template_part("template/content", "pages"); ?>
				</div>
			</article>
			<?php get_sidebar(); ?>
		</section>
	</section>
<?php get_footer(); ?>
