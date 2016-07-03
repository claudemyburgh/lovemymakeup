<?php   $args = array(
		//'number'     => $number,
		'orderby'    => 'title',
		'order'      => 'ASC',
		//'hide_empty' => $hide_empty,
		//'include'    => $ids
);


$product_categories = get_terms( 'product_cat', $args );

$count = count($product_categories);
if ( $count > 0 ){
	echo '<ul class="products-grid row menu-category-grid">';
		foreach ( $product_categories as $product_category ) {
				$cat_thumb = get_woocommerce_term_meta($product_category->term_id, 'thumbnail_id', true);
				$image = wp_get_attachment_url($cat_thumb);
				echo '<li class="sm-col-6 md-col-3 category-header"><div class="category-img-wrapper"><a class="category-image-link" href="' . get_term_link( $product_category ) . '"><img class="category-img" src="'.$image.'"/></a></div><a class="category-main-link" href="' . get_term_link( $product_category ) . '">' . $product_category->name . '<span class="category-count">'.$product_category->count .'</span>' . '</a>';
				$args = array(
						'posts_per_page' => -1,
						'tax_query' => array(
								'relation' => 'AND',
								array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => $product_category->slug
								)
						),
						'post_type' => 'product',
						'orderby' => 'title,'
				);
				$products = new WP_Query( $args );
				echo "<ul class='category-subcategories'>";
				while ( $products->have_posts() ) {
						$products->the_post();
						?>
								<li>
										<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
										</a>
								</li>
						<?php
				}
				echo "</li>";
				echo "</ul>";
		}
		echo '</ul>';
}
// echo "<pre>";
// var_dump($product_category);

?>
