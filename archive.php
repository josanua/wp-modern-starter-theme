<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter_main_theme
 */

get_header();
?>

<main class="archive-page">
	<!-- Archive Header Section -->
	<section class="archive-page__header">
		<div class="container">
			<div class="archive-page__header-content">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div class="archive-page__breadcrumbs">','</div>' );
					}
				?>
				
				<?php if ( have_posts() ) : ?>
					<div class="archive-page__title-section">
						<?php
							// Get archive information
							$archive_title = get_the_archive_title();
							$archive_description = get_the_archive_description();
							$post_count = $wp_query->found_posts;
							
							// Category specific info
							if ( is_category() ) {
								$category = get_queried_object();
								$category_color = get_term_meta( $category->term_id, 'category_color', true );
							}
						?>
						
						<div class="archive-page__icon">
							<?php if ( is_category() ) : ?>
								<i class="fas fa-folder-open"></i>
							<?php elseif ( is_tag() ) : ?>
								<i class="fas fa-tags"></i>
							<?php elseif ( is_author() ) : ?>
								<i class="fas fa-user-edit"></i>
							<?php elseif ( is_date() ) : ?>
								<i class="fas fa-calendar-alt"></i>
							<?php else : ?>
								<i class="fas fa-archive"></i>
							<?php endif; ?>
						</div>
						
						<h1 class="archive-page__title"><?php echo wp_kses_post( $archive_title ); ?></h1>
						
						<?php if ( $archive_description ) : ?>
							<div class="archive-page__description"><?php echo wp_kses_post( $archive_description ); ?></div>
						<?php endif; ?>
						
						<div class="archive-page__meta">
							<span class="archive-page__post-count">
								<i class="fas fa-file-alt"></i>
								<?php printf( _n( '%s article', '%s articles', $post_count, 'wp-modern-starter' ), number_format_i18n( $post_count ) ); ?>
							</span>
							<?php if ( is_category() ) : ?>
								<span class="archive-page__category-info">
									<i class="fas fa-bookmark"></i>
									<?php esc_html_e( 'Category', 'wp-modern-starter' ); ?>
								</span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Archive Content Section -->
	<section class="archive-page__content">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="archive-page__posts-grid">
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content-archive' );
						endwhile;
					?>
				</div>
				
				<!-- Pagination -->
				<div class="archive-page__navigation">
					<?php
						the_posts_pagination( array(
							'mid_size'  => 2,
							'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __( 'Previous', 'wp-modern-starter' ),
							'next_text' => __( 'Next', 'wp-modern-starter' ) . ' <i class="fas fa-chevron-right"></i>',
							'class'     => 'archive-pagination',
						) );
					?>
				</div>
			<?php else : ?>
				<div class="archive-page__no-posts">
					<div class="archive-page__empty-state">
						<div class="archive-page__empty-icon">
							<i class="fas fa-inbox"></i>
						</div>
						<h2 class="archive-page__empty-title"><?php esc_html_e( 'No posts found', 'wp-modern-starter' ); ?></h2>
						<p class="archive-page__empty-message"><?php esc_html_e( 'There are no posts in this archive yet. Check back later for new content.', 'wp-modern-starter' ); ?></p>
						<div class="archive-page__empty-actions">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="archive-page__btn archive-page__btn--primary">
								<i class="fas fa-home"></i>
								<?php esc_html_e( 'Back to Homepage', 'wp-modern-starter' ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
