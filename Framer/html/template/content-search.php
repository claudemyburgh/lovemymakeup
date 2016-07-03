<?php if(have_posts()):  ?>
	<?php while(have_posts()): the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<div class="heading-text-box-page">
				<h2 class="heading-search"><?php the_title(); ?></h2>
				</div>
			</header>
			<article >
				<?php the_post_thumbnail('small-tumbnail'); ?>
				<?php echo excerpt(50); ?>
			</article>
			<footer>
				<a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
			</footer>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
