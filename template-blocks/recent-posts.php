<?php
/**
 * Recent Posts Section
 *
 * Displays latest blog posts with featured post layout.
 * Uses BEM methodology for CSS classes and semantic HTML structure.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

// Section configuration
const BLOCK_TITLE                = 'Recent Posts from the Blog';
const VIEW_BLOG_LINK_TEXT        = 'See more blog posts';
const IMAGE_PLACEHOLDER_ALT_TEXT = 'WordPress development tutorials and programming guides';

// Custom query setup
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => FRONT_PAGE_RECENT_POSTS_NUM, // change posts numbs
);
$custom_query = new WP_Query( $args );
?>

<?php if ( isset( $custom_query ) && $custom_query->have_posts() ) : ?>
	
<section class="posts-section section--spacing-bottom" id="recent-posts" aria-labelledby="posts-heading">
	<div class="container">
		<div class="posts-section__inner">
			
				<header class="posts-section__header">
				<h2 id="posts-heading" class="posts-section__title">
					<?php echo esc_html( BLOCK_TITLE ); ?>
				</h2>
				<p class="posts-section__subtitle">Latest tutorials and insights from our development blog</p>
			</header>

				<div class="posts-section__layout row">
				<?php
				$post_count = 0;
				while ( $custom_query->have_posts() ) :
					$custom_query->the_post();
					$post_count++;

					if ( $post_count === 1 ) : ?>
							<div class="posts-section__featured col-md-7">
							<article class="posts-section__featured-post">
								
									<?php if ( has_post_thumbnail() ) : ?>
									<div class="posts-section__featured-image">
										<a href="<?php the_permalink(); ?>" 
										   class="posts-section__featured-link"
										   aria-label="Read <?php the_title_attribute(); ?>">
											<?php the_post_thumbnail( 'large', array( 
												'class' => 'posts-section__featured-img',
												'loading' => 'lazy'
											) ); ?>
										</a>
									</div>
								<?php else : ?>
									<div class="posts-section__featured-image">
										<a href="<?php the_permalink(); ?>" 
										   class="posts-section__featured-link"
										   aria-label="Read <?php the_title_attribute(); ?>">
											<img src="<?php echo esc_url( IMAGE_PLACEHOLDER_250x150 ); ?>"
												 class="posts-section__featured-img posts-section__featured-img--placeholder"
												 alt="<?php echo esc_attr( IMAGE_PLACEHOLDER_ALT_TEXT ); ?>"
												 loading="lazy">
										</a>
									</div>
								<?php endif; ?>

									<div class="posts-section__featured-content">
									<div class="article-meta">
										<?php $categories = get_the_category(); ?>
										<?php if ( ! empty( $categories ) ) : ?>
											<span class="category"><?php echo esc_html( $categories[0]->name ); ?></span>
										<?php endif; ?>
										<span class="date"><?php the_time( 'M j, Y' ); ?></span>
									</div>
									
									<h3 class="posts-section__featured-title">
										<a href="<?php the_permalink(); ?>" 
										   class="posts-section__featured-title-link">
											<?php the_title(); ?>
										</a>
									</h3>
									
									<div class="posts-section__featured-excerpt">
										<?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
									</div>
								</div>

							</article>
						</div><!-- /.posts-section__featured -->

							<div class="posts-section__sidebar col-md-5">
							<div class="posts-section__sidebar-inner">
								
					<?php endif; // End featured post ?>

					<?php if ( $post_count > 1 ) : ?>
							<article class="posts-section__sidebar-post">
							
								<div class="posts-section__sidebar-image">
								<a href="<?php the_permalink(); ?>" 
								   class="posts-section__sidebar-link"
								   aria-label="Read <?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'medium', array( 
											'class' => 'posts-section__sidebar-img',
											'loading' => 'lazy'
										) ); ?>
									<?php else : ?>
										<img src="<?php echo esc_url( NO_THUMBNAIL_IMG ); ?>"
											 class="posts-section__sidebar-img posts-section__sidebar-img--placeholder"
											 alt="<?php echo esc_attr( IMAGE_PLACEHOLDER_ALT_TEXT ); ?>"
											 loading="lazy">
									<?php endif; ?>
								</a>
							</div>

								<div class="posts-section__sidebar-content">
								<h4 class="posts-section__sidebar-title">
									<a href="<?php the_permalink(); ?>" 
									   class="posts-section__sidebar-title-link">
										<?php the_title(); ?>
									</a>
								</h4>
								
								<div class="posts-section__sidebar-excerpt">
									<?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
								</div>
								
								<div class="article-meta article-meta--sidebar">
									<?php $categories = get_the_category(); ?>
									<?php if ( ! empty( $categories ) ) : ?>
										<span class="category"><?php echo esc_html( $categories[0]->name ); ?></span>
									<?php endif; ?>
									<span class="date"><?php the_time( 'M j, Y' ); ?></span>
								</div>
							</div>

						</article>
					<?php endif; // End sidebar post ?>

				<?php endwhile; ?>

					<div class="posts-section__more">
					<a href="<?php echo esc_url( home_url( '/' ) . ALL_POSTS_PAGE_SLUG ); ?>" 
					   class="posts-section__more-link">
						<?php echo esc_html( VIEW_BLOG_LINK_TEXT ); ?> <i class="fas fa-arrow-right"></i>
					</a>
				</div>

							</div><!-- /.posts-section__sidebar-inner -->
						</div><!-- /.posts-section__sidebar -->
			</div><!-- /.posts-section__layout -->

		</div><!-- /.posts-section__inner -->
	</div><!-- /.container -->
</section><!-- /.posts-section -->

<?php 
wp_reset_postdata();
endif; ?>
