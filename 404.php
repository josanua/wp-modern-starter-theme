<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp_modern_starter
 */

get_header();
?>

<main class="error-page">
	<!-- 404 Hero Section -->
	<section class="error-page__hero">
		<div class="container">
			<div class="error-page__hero-content">
				<div class="error-page__icon">
					<span class="error-page__number">404</span>
					<div class="error-page__graphic">
						<i class="fas fa-search"></i>
					</div>
				</div>
				
				<h1 class="error-page__title">
					<?php esc_html_e( 'Page Not Found', 'wp-modern-starter' ); ?>
				</h1>
				
				<p class="error-page__message">
					<?php esc_html_e( 'Sorry, the page you\'re looking for doesn\'t exist. It might have been moved, deleted, or you entered the wrong URL.', 'wp-modern-starter' ); ?>
				</p>
				
				<!-- Enhanced Search Form -->
				<div class="error-page__search">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="search-form__wrapper">
							<input type="search" 
								   class="search-form__input" 
								   placeholder="<?php echo esc_attr__( 'Search for content...', 'wp-modern-starter' ); ?>" 
								   value="" 
								   name="s" 
								   autocomplete="off">
							<button type="submit" class="search-form__submit">
								<i class="fas fa-search"></i>
								<span class="sr-only"><?php esc_html_e( 'Search', 'wp-modern-starter' ); ?></span>
							</button>
						</div>
					</form>
				</div>
				
				<!-- Quick Actions -->
				<div class="error-page__actions">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="error-page__btn error-page__btn--primary">
						<i class="fas fa-home"></i>
						<?php esc_html_e( 'Go to Homepage', 'wp-modern-starter' ); ?>
					</a>
					<button onclick="history.back()" class="error-page__btn error-page__btn--secondary">
						<i class="fas fa-arrow-left"></i>
						<?php esc_html_e( 'Go Back', 'wp-modern-starter' ); ?>
					</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Helpful Content Section -->
	<section class="error-page__content">
		<div class="container">
			<div class="error-page__grid">
				<!-- Popular Posts -->
				<div class="error-page__section">
					<h3 class="error-page__section-title">
						<i class="fas fa-fire"></i>
						<?php esc_html_e( 'Popular Articles', 'wp-modern-starter' ); ?>
					</h3>
					<div class="error-page__posts">
						<?php
						$popular_posts = get_posts( array(
							'numberposts' => 4,
							'meta_key'    => 'post_views_count',
							'orderby'     => 'meta_value_num',
							'order'       => 'DESC',
						) );
						
						if ( ! empty( $popular_posts ) ) :
							foreach ( $popular_posts as $post ) : setup_postdata( $post );
						?>
							<article class="error-page__post">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="error-page__post-image">
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'error-page__post-thumbnail' ) ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="error-page__post-content">
									<h4 class="error-page__post-title">
										<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
									</h4>
									<div class="error-page__post-meta">
										<span class="error-page__post-date"><?php echo esc_html( get_the_date() ); ?></span>
										<span class="error-page__post-reading-time"><?php echo esc_html( wp_modern_starter_estimated_reading_time() ); ?> min read</span>
									</div>
								</div>
							</article>
						<?php 
							endforeach; 
							wp_reset_postdata(); 
						else :
						?>
							<p class="error-page__no-content"><?php esc_html_e( 'No popular articles available.', 'wp-modern-starter' ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<!-- Categories -->
				<div class="error-page__section">
					<h3 class="error-page__section-title">
						<i class="fas fa-folder"></i>
						<?php esc_html_e( 'Browse Categories', 'wp-modern-starter' ); ?>
					</h3>
					<div class="error-page__categories">
						<?php
						$categories = get_categories( array(
							'orderby' => 'count',
							'order'   => 'DESC',
							'number'  => 8,
							'hide_empty' => true,
						) );
						
						if ( ! empty( $categories ) ) :
							foreach ( $categories as $category ) :
						?>
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="error-page__category">
								<span class="error-page__category-name"><?php echo esc_html( $category->name ); ?></span>
								<span class="error-page__category-count"><?php echo esc_html( $category->count ); ?></span>
							</a>
						<?php 
							endforeach;
						else :
						?>
							<p class="error-page__no-content"><?php esc_html_e( 'No categories available.', 'wp-modern-starter' ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<!-- Recent Posts -->
				<div class="error-page__section">
					<h3 class="error-page__section-title">
						<i class="fas fa-clock"></i>
						<?php esc_html_e( 'Latest Articles', 'wp-modern-starter' ); ?>
					</h3>
					<div class="error-page__recent">
						<?php
						$recent_posts = get_posts( array(
							'numberposts' => 5,
							'post_status' => 'publish',
						) );
						
						if ( ! empty( $recent_posts ) ) :
							foreach ( $recent_posts as $post ) : setup_postdata( $post );
						?>
							<article class="error-page__recent-post">
								<h4 class="error-page__recent-title">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
								</h4>
								<div class="error-page__recent-meta">
									<span class="error-page__recent-date"><?php echo esc_html( get_the_date() ); ?></span>
								</div>
							</article>
						<?php 
							endforeach; 
							wp_reset_postdata();
						else :
						?>
							<p class="error-page__no-content"><?php esc_html_e( 'No recent articles available.', 'wp-modern-starter' ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="error-page__section">
					<h3 class="error-page__section-title">
						<i class="fas fa-envelope"></i>
						<?php esc_html_e( 'Need Help?', 'wp-modern-starter' ); ?>
					</h3>
					<div class="error-page__help">
						<p class="error-page__help-text">
							<?php esc_html_e( 'If you believe this is an error or need assistance, feel free to reach out.', 'wp-modern-starter' ); ?>
						</p>
						<div class="error-page__help-actions">
							<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="error-page__help-link">
								<i class="fas fa-comment"></i>
								<?php esc_html_e( 'Contact Support', 'wp-modern-starter' ); ?>
							</a>
							<a href="<?php echo esc_url( home_url( '/sitemap' ) ); ?>" class="error-page__help-link">
								<i class="fas fa-sitemap"></i>
								<?php esc_html_e( 'View Sitemap', 'wp-modern-starter' ); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
