<?php if(have_posts()):  ?>
	<?php while(have_posts()): the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(has_post_thumbnail()): ?>
				<figure class="banner-image">
					<?php the_post_thumbnail('banner-image'); ?>
				</figure>
			<?php endif; ?>
			<header>
				<div class="heading-text-box">
				<h1 class="heading"><?php the_title(); ?></h1>
				</div>
			</header>
			<article >
				<?php the_content(); ?>
			</article>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
