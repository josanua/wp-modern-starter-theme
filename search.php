<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_modern_starter_main_theme
 */

get_header();
?>

<main class="search-page">
	<!-- Search Header Section -->
	<section class="search-page__header">
		<div class="container">
			<div class="search-page__header-content">
				<h1 class="search-page__title">
					<?php if ( have_posts() ) : ?>
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for "%s"', 'wp-modern-starter' ), '<span class="search-page__query">' . get_search_query() . '</span>' );
						?>
					<?php else : ?>
						<?php esc_html_e( 'No Results Found', 'wp-modern-starter' ); ?>
					<?php endif; ?>
				</h1>
				
				<?php if ( have_posts() ) : ?>
					<p class="search-page__subtitle">
						<?php
						/* translators: %s: number of results */
						printf( esc_html( _n( 'Found %s result', 'Found %s results', $wp_query->found_posts, 'wp-modern-starter' ) ), number_format_i18n( $wp_query->found_posts ) );
						?>
					</p>
				<?php endif; ?>
				
				<!-- Enhanced Search Form -->
				<div class="search-page__form">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="search-form__wrapper">
							<input type="search" 
								   class="search-form__input" 
								   placeholder="<?php echo esc_attr__( 'Search for articles, tutorials, guides...', 'wp-modern-starter' ); ?>" 
								   value="<?php echo get_search_query(); ?>" 
								   name="s" 
								   autocomplete="off">
							<button type="submit" class="search-form__submit">
								<i class="fas fa-search"></i>
								<span class="sr-only"><?php esc_html_e( 'Search', 'wp-modern-starter' ); ?></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Search Results Section -->
	<section class="search-page__content">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="search-page__results">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
					?>
				</div>

				<!-- Pagination -->
				<nav class="search-page__pagination">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __( 'Previous', 'wp-modern-starter' ),
						'next_text' => __( 'Next', 'wp-modern-starter' ) . ' <i class="fas fa-chevron-right"></i>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wp-modern-starter' ) . ' </span>',
					) );
					?>
				</nav>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
