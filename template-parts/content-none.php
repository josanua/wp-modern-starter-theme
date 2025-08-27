<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter_main_theme
 */

?>

<section class="no-results">
	<?php if ( is_search() ) : ?>
		<!-- Search No Results -->
		<div class="no-results__search">
			<div class="no-results__icon">
				<i class="fas fa-search"></i>
			</div>
			
			<h2 class="no-results__title">
				<?php esc_html_e( 'No Results Found', 'wp-modern-starter' ); ?>
			</h2>
			
			<p class="no-results__message">
				<?php 
				/* translators: %s: search query */
				printf( esc_html__( 'Sorry, we couldn\'t find any results for "%s". Try adjusting your search or browse our content below.', 'wp-modern-starter' ), '<strong>' . get_search_query() . '</strong>' ); 
				?>
			</p>
			
			<div class="no-results__suggestions">
				<h3 class="no-results__suggestions-title"><?php esc_html_e( 'Search Suggestions:', 'wp-modern-starter' ); ?></h3>
				<ul class="no-results__suggestions-list">
					<li><?php esc_html_e( 'Check your spelling and try again', 'wp-modern-starter' ); ?></li>
					<li><?php esc_html_e( 'Try different or more general keywords', 'wp-modern-starter' ); ?></li>
					<li><?php esc_html_e( 'Use fewer keywords for broader results', 'wp-modern-starter' ); ?></li>
				</ul>
			</div>
			
			<!-- Popular Posts -->
			<?php
			$popular_posts = get_posts( array(
				'numberposts' => 3,
				'meta_key'    => 'post_views_count',
				'orderby'     => 'meta_value_num',
				'order'       => 'DESC',
			) );
			
			if ( ! empty( $popular_posts ) ) :
			?>
				<div class="no-results__popular">
					<h3 class="no-results__popular-title"><?php esc_html_e( 'Popular Articles', 'wp-modern-starter' ); ?></h3>
					<div class="no-results__popular-posts">
						<?php foreach ( $popular_posts as $post ) : setup_postdata( $post ); ?>
							<article class="no-results__popular-post">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="no-results__popular-image">
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'no-results__popular-thumbnail' ) ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="no-results__popular-content">
									<h4 class="no-results__popular-post-title">
										<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
									</h4>
									<div class="no-results__popular-meta">
										<span class="no-results__popular-date"><?php echo esc_html( get_the_date() ); ?></span>
										<span class="no-results__popular-reading-time"><?php echo esc_html( wp_modern_starter_estimated_reading_time() ); ?> min read</span>
									</div>
								</div>
							</article>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		
	<?php else : ?>
		<!-- General No Content -->
		<div class="no-results__general">
			<div class="no-results__icon">
				<i class="fas fa-file-alt"></i>
			</div>
			
			<h2 class="no-results__title">
				<?php esc_html_e( 'Nothing Found', 'wp-modern-starter' ); ?>
			</h2>
			
			<p class="no-results__message">
				<?php 
				if ( is_home() && current_user_can( 'publish_posts' ) ) {
					esc_html_e( 'Ready to publish your first post?', 'wp-modern-starter' );
				} else {
					esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help or try browsing our latest content.', 'wp-modern-starter' );
				}
				?>
			</p>
			
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<div class="no-results__admin-actions">
					<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="no-results__admin-link">
						<?php esc_html_e( 'Create Your First Post', 'wp-modern-starter' ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</section>
