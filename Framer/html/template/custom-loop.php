<?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<div class="wrapper padding">
		<section class="row">
			<article class="sm-col-12">
				<section id="post-<?php the_ID(); ?>" <?php post_class('front-page-blog'); ?>>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('small-tumbnail'); ?>
					</a>

					<header>
				    <?php the_title( '<h1 class="header-link"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h1>' ); ?>
					</header>
					<article >
						<?php the_excerpt(); ?>
						<a class="btn btn-primary" href="<?php the_permalink(); ?>">Read full blog</a>
					</article>
				</section>
			</article>
		</section>
	</div><!--wrapper-->
<?php endwhile; ?>
